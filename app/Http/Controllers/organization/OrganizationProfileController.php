<?php

namespace App\Http\Controllers\organization;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $organization = Organization::where('user_id', $user->id)->first();
        $opportunities = Opportunity::where('user_id', $user->id)->get();

        return view('profile.organization.profile',compact('user','organization','opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'organization_name' => 'required|string|max:255',
                'organization_type' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'bio' => 'nullable|string|max:500',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'zip' => 'nullable|string|max:20',
                'website' => 'nullable|url|max:255',
                'is_verified' => 'nullable|boolean',
                'country' => 'nullable|string|max:255',
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'instagram' => 'nullable|url',
                'linkedin' => 'nullable|url',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $user = auth()->user();

            
            $user->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
            ]);

            $logoPath = null;
            $coverPath = null;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
            }
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('organization_covers', 'public');
            }

            $opportunities = Opportunity::where('user_id', $user->id)->get();
            $organization = Organization::updateOrCreate(
                ['user_id' => $user->id],
                [   'organization_name' => $request->organization_name,
                    'organization_type' => $request->organization_type,
                    'bio' => $request->bio,
                    'website' => $request->website,
                    'is_verified' => $request->is_verified ?? true,
                    'logo' => $logoPath,
                    'cover' => $coverPath,
                ]
            );
            return view('profile.organization.profile',compact('user','organization','opportunities'))->with('success', 'Profil mis à jour avec succès.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
