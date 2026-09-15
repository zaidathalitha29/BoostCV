<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->get();

        return view('admin.payments', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'method' => 'required|in:bank_transfer,e_wallet',
            'proof' => 'nullable|image|max:2048',
        ]);

        $payment = new Payment();
        $payment->order_id = $request->order_id;
        $payment->amount = $request->amount;
        $payment->method = $request->method;
        $payment->status = 'pending';

        if ($request->hasFile('proof')) {
            $payment->proof = $request->file('proof')->store('payment_proofs', 'public');
        }

        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dikirim.');
    }

        public function verify($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->status = 'verified';
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

        public function reject($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->status = 'rejected';
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran ditolak.');
    }
}