<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('frontend.register');
    }

    /**
     * Process the registration form.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', 
    
        'date_of_birth' => null,
        'marital_status' => null,
        'mobile_number' => null,
        'present_address' => null,
        'state' => null,
        'city' => null,
        'postal_code' => null,
        'image' => null,
        'yearly_salary' => null,
        'profession' => null,
    ]);

    event(new Registered($user));
    Auth::login($user);

 
    return redirect()->route('frontend.home');
}
}
