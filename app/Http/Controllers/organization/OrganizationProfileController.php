<?php

namespace App\Http\Controllers\organization;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $organization = Organization::where('user_id', $user->id)->first();
        $opportunities = Opportunity::where('user_id', $user->id)->get();

        return view('profile.organization.profile',compact('user','organization','opportunities'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'organization_name' => 'nullable|string|max:255',
            'organization_type' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Autres validations ici
        ]);
        
        // Mettre à jour les données de l'utilisateur
        $user->update([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        
        // Récupérer le profil existant de l'organisation
        $organization = Organization::where('user_id', $user->id)->first();
        
        // Garder les valeurs actuelles des images si aucun nouveau fichier n'est téléchargé
        $logoPath = $organization ? $organization->logo : null;
        $coverPath = $organization ? $organization->cover : null;
        
        // Traiter les nouveaux fichiers s'ils sont fournis
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
        
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
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
    public function show($id)
    {
        $organization = Organization::with('user')->findOrFail($id);
        $opportunities = $organization->opportunities()->get();

        return view('profile.organization.readonly', compact('organization', 'opportunities'));
    }
}
