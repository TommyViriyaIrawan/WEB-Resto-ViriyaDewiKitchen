<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Welcome Page
    public function showWelcome()
    {
        return view('welcome');
    }

    // Guest Order Logic
    public function guestOrder(Request $request)
    {
        // Generate a Guest ID if not already present
        if (!$request->session()->has('guest_id')) {
            $guestId = uniqid('guest_'); // Generate a unique guest ID
            $request->session()->put('guest_id', $guestId);
        }

        return redirect()->route('homepage'); // Redirect to homepage
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation attacks
            return redirect()->route('homepage')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Process Registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password
            'is_guest' => false, // Ensure the user is not marked as a guest
        ]);

        // Automatically log in the user after registration
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
