<?php

namespace App\Http\Controllers\volunteer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $volunteer = Volunteer::where('user_id', $user->id)->first();

        if ($volunteer && $volunteer->date_of_birth) {
            $volunteer->date_of_birth = Carbon::parse($volunteer->date_of_birth)->format('Y-m-d');
        }
        return view('profile.volunteer.profile', compact('user','volunteer'));
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        // Validation code...

        $user = auth()->user();
        
        $user->update([
            'phone' => $request->phone,
            'bio' => $request->bio,
            'function' => $request->function,
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

        // Récupérer le profil existant du volontaire
        $volunteer = Volunteer::where('user_id', $user->id)->first();
        
        // Garder les valeurs actuelles des images si aucun nouveau fichier n'est téléchargé
        $profilePicturePath = $volunteer ? $volunteer->profile_picture : null;
        $coverPath = $volunteer ? $volunteer->cover : null;

        // Traiter les nouveaux fichiers s'ils sont fournis
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
        
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        // Mettre à jour ou créer l'enregistrement du volontaire
        $volunteer = Volunteer::updateOrCreate(
            ['user_id' => $user->id],
            [
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'skills' => $request->skills,
                'interests' => $request->interests,
                'available' => $request->available ?? true,
                'profile_picture' => $profilePicturePath,
                'cover' => $coverPath,
            ]
        );
        
        return view('profile.volunteer.profile', compact('user', 'volunteer'))->with('success', 'Profil mis à jour avec succès.');
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
