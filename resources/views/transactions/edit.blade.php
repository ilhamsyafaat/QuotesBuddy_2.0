@extends('layouts.app')

@section('contents')
    <div class="container">
        <h1 class="mb-0">Edit Transaction</h1>
        <hr />
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $transaction->email }}" required>
            </div>
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" name="card_number" class="form-control" id="card-number" value="{{ $transaction->card_number }}" required>
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry Date</label>
                <input type="date" name="expiry_date" class="form-control" id="expiry-date" value="{{ $transaction->expiry_date }}" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" class="form-control" id="cvv" value="{{ $transaction->cvv }}" required>
            </div>
            <div class="form-group">
                <label for="payment-method">Payment Method</label>
                <select name="payment_method" class="form-control" id="payment-method" required>
                    <option value="visa" {{ $transaction->payment_method == 'visa' ? 'selected' : '' }}>Visa</option>
                    <option value="mastercard" {{ $transaction->payment_method == 'mastercard' ? 'selected' : '' }}>MasterCard</option>
                    <option value="paypal" {{ $transaction->payment_method == 'paypal' ? 'selected' : '' }}>PayPal</option>
                    <option value="stripe" {{ $transaction->payment_method == 'stripe' ? 'selected' : '' }}>Stripe</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a class="btn btn-danger" href="{{ route('transactions') }}">Cancel</a>
        </form>
    </div>
@endsection
