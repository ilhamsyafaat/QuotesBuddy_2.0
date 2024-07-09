<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        // $transactions = Transaction::orderBy('created_at', 'DESC')->paginate(4);
        $transactions = DB::table('transactions')->orderBy('id', 'desc')->paginate(4);
        // $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

   //admin
    public function create_transaksi()
    {
        return view('transactions.create_transaksi');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'card_number' => 'required|string',
                'expiry_date' => 'required|date',
                'cvv' => 'required|string',
                'payment_method' => 'required|string',
                // 'payment_plan' => 'required|string',
                // 'photo' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );

        $transaction = new Transaction();
        $transaction->email = $request->email;
        $transaction->card_number = $request->card_number;
        $transaction->expiry_date = $request->expiry_date;
        $transaction->cvv = $request->cvv;
        $transaction->payment_method = $request->payment_method;
        // $transaction->payment_plan = $request->payment_plan;
        $transaction->save();

        return redirect()->route('transactions')->with('success', 'Product added successfully');
    }

    //user create
    public function create_cm()
    {
        return view('transactions.create_cm');
    }

    public function store_cm(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'card_number' => 'required|string',
                'expiry_date' => 'required|date',
                'cvv' => 'required|string',
                'payment_method' => 'required|string',
                // 'payment_plan' => 'required|string',
                // 'photo' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );

        $transaction = new Transaction();
        $transaction->email = $request->email;
        $transaction->card_number = $request->card_number;
        $transaction->expiry_date = $request->expiry_date;
        $transaction->cvv = $request->cvv;
        $transaction->payment_method = $request->payment_method;
        // $transaction->payment_plan = $request->payment_plan;
        $transaction->save();

        return redirect()->route('landing.upsell page.upsell')->with('success', 'Product added successfully');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->email = $request->email;
        $transaction->card_number = $request->card_number;
        $transaction->expiry_date = $request->expiry_date;
        $transaction->cvv = $request->cvv;
        $transaction->payment_method = $request->payment_method;
        // $transaction->payment_plan = $request->payment_plan;
        $transaction->save();

        return redirect()->route('transactions')->with('success', 'product updated successfully');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions')->with('success', 'product deleted successfully');
    }
}
