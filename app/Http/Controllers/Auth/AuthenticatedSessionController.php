<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Authenticate the user based on the provided credentials.

        $request->session()->regenerate(); // Regenerate the session to prevent session fixation attacks.

        $authUserRole = Auth::user()->role; // Retrieve the authenticated user's role.

        // Redirect based on user role
        if ($authUserRole == 0) // Check if the user is an applicant
        {
            return redirect()->intended(route('applicant', absolute: 'false')); // Redirect to the aplicant dashboard.
        }
        elseif ($authUserRole == 1) // Check if the user is a Hod
        {
            return redirect()->intended(route('HOD', absolute: 'false')); // Redirect to the HOD dashboard.
        }
        elseif ($authUserRole == 2) // Check if the user is a Dean
        {
            return redirect()->intended(route('Dean', absolute: 'false')); // Redirect to the Dean dashboard.
        }
        elseif ($authUserRole == 3) // Check if the user is a registrar
        {
            return redirect()->intended(route('Registrar', absolute: 'false')); // Redirect to the Registrar dashboard.
        }
        elseif ($authUserRole == 4) // Check if the user is a Uregistrar
        {
            return redirect()->intended(route('Uregistrar', absolute: 'false')); // Redirect to the Uregistrar dashboard.
        }
        else // For all other roles (e.g., regular users)
        {
            return redirect()->intended(route('dashboard', absolute: 'false')); // Redirect to the general user dashboard.
        }

        // Future scaling: Consider using a role-based access control (RBAC) system for easier management of user roles and permissions.
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/');
        return redirect()->route('login');
    }
}
