<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role == 'creator') {
            return redirect()->route('creator.dashboard');
        }

        if ($role == 'customer') {
            return redirect()->route('customer.dashboard');
        }

        abort(403);
    }


    public function admin()
    {
        return view('admin.dashboard');
    }


    public function creator()
    {
        return view('creator.dashboard');
    }


    public function customer()
    {
        return view('customer.dashboard');
    }
}