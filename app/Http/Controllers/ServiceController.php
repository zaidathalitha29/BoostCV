<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Creator;
use App\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $creators = Creator::all();
        $categories = Category::all();
        return view('service.index', compact('services', 'creators', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creators = Creator::all();
        $categories = Category::all();
        return view('service.create', compact('creators', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'creator_id' => 'required|exists:creators,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'estimated_days' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ]);

        Service::create([
            'creator_id' => $request->creator_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'estimated_days' => $request->estimated_days,
            'status' => $request->status,
        ]);

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $creators = Creator::all();
        $categories = Category::all();
        return view('service.edit', compact('service', 'creators', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'creator_id' => 'required|exists:creators,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'estimated_days' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'creator_id' => $request->creator_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'estimated_days' => $request->estimated_days,
            'status' => $request->status,
        ]);

        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index');
    }
}
