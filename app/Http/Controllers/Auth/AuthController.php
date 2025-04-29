<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

       // Show registration form based on role
       public function showRegistrationForm($role)
       {
           if ($role === 'volunteer') {
               return view('auth.register_volunteer');
           } elseif ($role === 'organization') {
               return view('auth.register_organization');
           }
   
           abort(404); // Invalid role
       }
       public function showLoginForm()
       {
           return view('auth.login');
       }
       public function registerVolunteer(Request $request)
        {
                
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'phone' => 'nullable|string',
                ]);

                $isFirstUser = (User::count() === 0);


                $user = User::create([
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'role' => $isFirstUser ? 'admin' : 'volunteer',
                ]);
                
                
                Volunteer::create([
                    'user_id' => $user->id,
                    'date_of_birth' => $request->date_of_birth,
                    'skills' => $request->skills,
                    'interests' => $request->interests,
                ]);
                
                // send email verification notification
                $user->sendEmailVerificationNotification();

                Auth::login($user);

                return redirect()->route('verification.notice')->with('status', 'Please check your email for a verification link');
        }
            // Handle organization registration
        public function registerOrganization(Request $request)
        {
            $request->validate([
                'organization_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'nullable|string',
                'password' => 'required|string|min:8|confirmed',
                'website' => 'nullable|url',
            ]);

            $user = User::create([
                'name' => $request->organization_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => 'organization',
            ]);

            Organization::create([
                'user_id' => $user->id,
                'organization_name' => $request->organization_name,
                'website' => $request->website,
            ]);

            $user->sendEmailVerificationNotification();
            Auth::login($user);

            return redirect()->route('verification.notice')->with('success', 'Organization registered successfully!');
        }


        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                // Check if user is admin, redirect directly to admin dashboard
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                
                // For non-admin users, continue with the usual verification check
                if (Auth::user()->hasVerifiedEmail()) {
                    return redirect()->intended('home');
                } else {
                    return redirect()->route('verification.notice');
                }
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }


    
}