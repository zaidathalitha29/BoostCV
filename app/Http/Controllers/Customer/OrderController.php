<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Service;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan customer.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('service')
            ->latest()
            ->get();

        return view('customer.order.index', compact('orders'));
    }

    /**
     * Menampilkan form membuat pesanan.
     */
    public function create()
    {
        $services = Service::where('status', 'active')
            ->with('creator', 'category')
            ->get();

        return view('customer.order.create', compact('services'));
    }

    /**
     * Menyimpan pesanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $service = Service::findOrFail($request->service_id);

        $order = Order::create([
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => Auth::id(),
            'service_id' => $service->id,
            'total_price' => $service->price,
            'requirements' => $request->requirements,
            'deadline' => $request->deadline,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->with('service')
            ->findOrFail($id);

        return view('customer.order.show', compact('order'));
    }

    /**
     * Menampilkan form edit pesanan.
     */
    public function edit($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($id);

        $services = Service::where('status', 'active')
            ->with('creator', 'category')
            ->get();

        return view('customer.order.edit', compact('order', 'services'));
    }

    /**
     * Memperbarui pesanan.
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $service = Service::findOrFail($request->service_id);

        $order->update([
            'service_id' => $service->id,
            'total_price' => $service->price,
            'requirements' => $request->requirements,
            'deadline' => $request->deadline,
        ]);

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Menghapus pesanan.
     */
    public function destroy($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($id);

        $order->delete();

        return redirect()
            ->route('customer.orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}