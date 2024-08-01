<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot_password'); // Form nhập email
    }

    public function sendPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        $password = $user->password; // Mật khẩu đã mã hóa

        // Gửi email
        Mail::to($email)->send(new ForgotPasswordMail($password));

        return redirect()->route('login')->with('status', 'Mật khẩu đã được gửi đến email của bạn.');
    }
}
