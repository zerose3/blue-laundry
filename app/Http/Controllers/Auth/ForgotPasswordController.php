<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('auth.forgot-password');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Str::random(60);

        // Simpan token di session untuk demo (production: database password_resets)
        session()->put('password_reset_' . $user->email, $token);

        // Simulasi: tampilkan token di toast (production: kirim email)
        return back()->with('status', 'Link reset password telah dikirim (simulasi: token ' . $token . ')');
    }
}
