<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Creator;

class ProfileController extends Controller
{
    /**
     * Display the creator profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creator = Auth::user()->creator;

        return view('creator.profile.index', compact('creator'));
    }

    /**
     * Show the form for editing the creator profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $creator = Auth::user()->creator;

        return view('creator.profile.edit', compact('creator'));
    }

    /**
     * Update the creator profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $creator = Auth::user()->creator;

        $request->validate([
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'bio' => $request->bio,
            'phone' => $request->phone,
        ];

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')
                ->store('profile_photos', 'public');
        }

        $creator->update($data);

        return redirect()
            ->route('creator.profile.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}