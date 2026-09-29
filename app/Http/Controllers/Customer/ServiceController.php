<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of available services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('status', 'active')
            ->with(['creator', 'category'])
            ->get();

        return view('customer.service.index', compact('services'));
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::where('status', 'active')
            ->with(['creator', 'category'])
            ->findOrFail($id);

        return view('customer.service.show', compact('service'));
    }
}