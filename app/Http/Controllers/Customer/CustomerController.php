<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class CustomerController extends Controller
{
    /**
     * Menampilkan profil customer
     */
    public function profile()
    {
        $user = User::findOrFail(Auth::id());

        return view('customer.profile', compact('user'));
    }

    /**
     * Menampilkan halaman edit profil
     */
    public function editProfile()
    {
        $user = User::findOrFail(Auth::id());

        return view('customer.profile-edit', compact('user'));
    }

    /**
     * Memperbarui profil customer
     */
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}