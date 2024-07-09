@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h2 class="mb-0">Create Transaction</h2>
    <a href="{{ route('transactions') }}" class="btn btn-secondary">Back to List</a>
</div>
<hr />

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('transactions.store') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="card_number">Card Number</label>
        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter Card Number" value="{{ old('card_number') }}">
    </div>
    <div class="form-group">
        <label for="expiry_date">Expiry Date</label>
        <input type="date" class="form-control datepicker" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" value="{{ old('expiry_date') }}">
    </div>
    <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV" value="{{ old('cvv') }}">
    </div>
    <div class="form-group">
        <label>Payment Method</label><br>
        <div class="btn-group">
            <div class="btn-group">
                <button id="paymentMethodDropdown" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(old('payment_method') == 'Credit Card' && old('payment_method') !== null)
                        Credit Card
                    @else
                        - Select Payment
                    @endif
                </button>
                <div class="dropdown-menu" aria-labelledby="paymentMethodDropdown">
                    <button type="button" class="dropdown-item payment-method" data-value="Credit Card">Credit Card</button>
                    <button type="button" class="dropdown-item payment-method" data-value="Master Card">Master Card</button>
                    <button type="button" class="dropdown-item payment-method" data-value="Stripe">Stripe</button>
                    <button type="button" class="dropdown-item payment-method" data-value="PayPal">PayPal</button>
                    <button type="button" class="dropdown-item payment-method" data-value="Bank Transfer">Bank Transfer</button>
                </div>
            </div>
            <input type="hidden" name="payment_method" id="selected-payment-method" value="{{ old('payment_method', '') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-warning">Submit</button>
</form>


<!-- Load datepicker script -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}

<script>
     document.addEventListener('DOMContentLoaded', function() {
        // Function to focus and open the date picker
        function openDatePicker() {
            var dateInput = document.getElementById('expiry_date');
            dateInput.type = 'date';
            dateInput.showPicker();
        }

        // Set up click event on the date input field
        document.getElementById('expiry_date').addEventListener('click', openDatePicker);
        document.getElementById('expiry_date').addEventListener('focus', openDatePicker);

        // Ensure selected date is shown in the input field
        document.getElementById('expiry_date').addEventListener('change', function() {
            if(this.value) {
                this.type = 'text';
                this.type = 'date';
            }
        });

        // JavaScript for handling payment method selection
        document.querySelectorAll('.payment-method').forEach(function(button) {
            button.addEventListener('click', function() {
                var selectedMethod = this.getAttribute('data-value');
                document.getElementById('selected-payment-method').value = selectedMethod;
                document.getElementById('paymentMethodDropdown').innerText = selectedMethod;
            });
        });

        // Set min attribute to today's date
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('expiry_date').setAttribute('min', today);

    });
</script>
@endsection

