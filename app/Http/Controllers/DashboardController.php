<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role == 'admin') {
            return redirect('/admin/dashboard');
        }

        if ($role == 'creator') {
            return redirect('/creator/dashboard');
        }

        return redirect('/customer/dashboard');
    }
}