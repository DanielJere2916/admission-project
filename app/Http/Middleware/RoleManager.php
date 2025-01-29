<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  The role required to access the route
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Get the role of the authenticated user
        $authUserRole = Auth::user()->role;

        // Check if the user's role matches the required role
        switch ($role) {
            case 'Applicant':
                if ($authUserRole == '0') {
                    return $next($request); // Allow access for admin
                }
                break;
            case 'HOD':
                if ($authUserRole == '1') {
                    return $next($request); // Allow access for vendor
                }
                break;
            case 'Dean':
                if ($authUserRole == '2') {
                    return $next($request); // Allow access for customer
                }
                break;     
            case 'Registrar':
                if ($authUserRole == '3') {
                    return $next($request); // Allow access for customer
                }
                break;     
            case 'Uregistrar':
                if ($authUserRole == '4') {
                    return $next($request); // Allow access for customer
                }
                break;     
        }

        // Redirect based on the user's role if access is denied
        switch ($authUserRole) {
            case 0:
                return redirect()->route('applicant'); // Redirect admin to applicant dashboard
            case 1:
                return redirect()->route('HOD'); // Redirect vendor to vendor dashboard
            case 2:
                return redirect()->route('Dean'); // Redirect customer to dashboard
            case 3:
                return redirect()->route('Registrar'); // Redirect customer to dashboard
            case 4:
                return redirect()->route('Uregistrar'); // Redirect customer to dashboard
        }

        return redirect()->route('login'); // Default redirect to login if no conditions are met
    }
}
