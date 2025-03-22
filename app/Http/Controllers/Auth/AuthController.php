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
       public function registerVolunteer(Request $request)
        {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'date_of_birth' => 'nullable|date',
                'skills' => 'nullable|string',
                'interests' => 'nullable|string',
            ]);


            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email
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
                'password' => 'required|string|min:8|confirmed',
                'phone' => ['required', 'regex:/^(?:\+212|0)([5-7])\d{8}$/', 'unique:users'] ,
                'description' => 'nullable|string',
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
                'description' => $request->description,
                'website' => $request->website,
            ]);

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Organization registered successfully!');
        }


    
}
