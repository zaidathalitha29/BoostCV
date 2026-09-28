<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creator;
use App\User;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators = Creator::all();
        $users = User::all();
        return view('creator.index', compact('creators', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('creator.create', compact('users'));
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
            'user_id' => 'required|exists:users,id',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $profilePhoto = null;

        if ($request->hasFile('profile_photo')) 
        {
            $profilePhoto = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        Creator::create([
            'user_id' => $request->user_id,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'profile_photo' => $profilePhoto,
        ]);

        return redirect()->route('creator.index');
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
        $creator = Creator::findOrFail($id);
        $users = User::all();
        return view('creator.edit', compact('creator', 'users'));
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
            'user_id' => 'required|exists:users,id',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $creator = Creator::findOrFail($id);

        $data = [
            'user_id' => $request->user_id,
            'bio' => $request->bio,
            'phone' => $request->phone,
        ];

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $creator->update($data);


        return redirect()->route('creator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Creator::where('id', $id)->delete();
        return redirect()->route('creator.index');
    }
}
