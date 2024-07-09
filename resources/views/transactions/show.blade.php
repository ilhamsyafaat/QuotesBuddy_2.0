@extends('layouts.app')
  
{{-- @section('title', 'Show Product') --}}
  
@section('contents')
    <h1 class="mb-0">Transaction Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $transaction->email }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Card Number</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $transaction->card_number }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">CVV</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $transaction->cvv }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $transaction->payment_method }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $transaction->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $transaction->updated_at }}" readonly>
        </div>
    </div>
    </div>
        <a href="{{ route('transactions') }}" class="btn btn-warning mt-3 ml-4">Back to List</a>
    </div>
@endsection