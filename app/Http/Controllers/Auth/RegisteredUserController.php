<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required', 'string'], // Required
            'country' => ['required', 'string'], // Required
            'phonenumber' => ['required', 'string'], // Required
        ]);

        // Generate the applicant_id
        $randomNumber = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        $currentYearLastTwoDigits = substr(date('Y'), -2);
        $applicantId = "Laws/{$randomNumber}/{$currentYearLastTwoDigits}";

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'applicant_id' => $applicantId,
            'gender' => $request->gender, // Required
            'country' => $request->country, // Required
            'phonenumber' => $request->phonenumber, // Required
            'department_id' => null, // Nullable (not included in the form)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}