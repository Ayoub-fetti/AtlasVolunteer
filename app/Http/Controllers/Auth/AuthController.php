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
                'date_of_birth' => 'nullable|date',
                'skills' => 'nullable|string',
                'interests' => 'nullable|string',
            ]);


            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 'volunteer',
            ]);


            Volunteer::create([
                'user_id' => $user->id,
                'date_of_birth' => $request->date_of_birth,
                'skills' => $request->skills,
                'interests' => $request->interests,
            ]);

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Volunteer registered successfully!');
        }
            // Handle organization registration
    public function registerOrganization(Request $request)
        {
            $request->validate([
                'organization_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'nullable|string',
                'password' => 'required|string|min:8|confirmed',
                // 'bio' => 'nullable|string',
                'website' => 'nullable|url',
            ]);

            $user = User::create([
                'name' => $request->organization_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                // 'bio' => $request->bio,
                'role' => 'organization',
            ]);

            Organization::create([
                'user_id' => $user->id,
                'organization_name' => $request->organization_name,
                // 'bio' => $request->bio,
                'website' => $request->website,
            ]);

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Organization registered successfully!');
        }


        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('home');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }


    
}
