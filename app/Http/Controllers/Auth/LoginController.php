<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['name' => 'Invalid user or password']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

    public function showEditForm()
    {
        $user = Auth::user();
        return view('edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:16',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8',
        ], [
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name must not exceed 16 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email must not exceed 255 characters.',
            'email.unique' => 'This email is already taken.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else $validatedData['password'] = $request->user()->password;

        $user->update($validatedData);

        return redirect()->route('edit_profile')->with('success', 'Profile updated successfully!');
    }
}
