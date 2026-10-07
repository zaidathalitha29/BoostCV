<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Order;

class PaymentController extends Controller
{
    /**
     * Menampilkan daftar pembayaran customer.
     */
    public function index()
    {
        $payments = Payment::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('order')
        ->latest()
        ->get();

        return view('customer.payment.index', compact('payments'));
    }

    /**
     * Menampilkan form pembayaran.
     */
    public function create()
    {
        $orders = Order::where('user_id', Auth::id())
            ->whereDoesntHave('payment')
            ->with('service')
            ->latest()
            ->get();

        return view('customer.payment.create', compact('orders'));
    }

    /**
     * Menyimpan pembayaran.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string|max:100',
            'payment_proof' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $order = Order::where('user_id', Auth::id())
            ->findOrFail($request->order_id);

        $paymentProof = null;

        if ($request->hasFile('payment_proof')) {
            $paymentProof = $request->file('payment_proof')
                ->store('payment_proofs', 'public');
        }

        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_price,
            'payment_method' => $request->payment_method,
            'payment_proof' => $paymentProof,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('customer.payments.index')
            ->with('success', 'Pembayaran berhasil dikirim dan sedang menunggu verifikasi.');
    }

    /**
     * Menampilkan detail pembayaran.
     */
    public function show($id)
    {
        $payment = Payment::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('order')
        ->findOrFail($id);

        return view('customer.payment.show', compact('payment'));
    }
}