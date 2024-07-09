@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h2 class="mb-0">List Transaksi</h2>
    <a href="{{ route('transactions.create_transaksi') }}" class="btn btn-primary">Create Transaction</a>
</div>
<hr />
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Card Number</th>
                <th>Expiry Date</th>
                <th>CVV</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>+
            @if($transactions->count() > 0)
                @foreach($transactions as $key => $transaction)
                    <tr>
                        <td class="align-middle">{{ $transactions->firstItem() + $key }}</td>
                        <td class="align-middle">{{ $transaction->email }}</td>
                        <td class="align-middle">{{ $transaction->card_number }}</td>
                        <td class="align-middle">{{ $transaction->expiry_date }}</td>
                        <td class="align-middle">{{ $transaction->cvv }}</td>
                        <td class="align-middle">{{ $transaction->payment_method }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('transactions.show', $transaction->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="12">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6">
            Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of {{ $transactions->total() }} entries
        </div>
        <div class="col-md-6 text-right mb-5 d-flex justify-content-end">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
