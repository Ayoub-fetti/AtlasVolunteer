<?php

namespace App\Http\Controllers\volunteer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyOpportuniyController extends Controller
{
    public function list(){
        $user = Auth::user();
        $applications = Application::where('user_id', Auth::id())->get();
        return view('profile.volunteer.application', compact('user', 'applications'));
    }
    public function apply( Request $request, $opportunityId)
    {
        $user = Auth::user();

        // Verifier si l'utilisateur a déjà postulé
        $existingApplication = Application::where('user_id', $user->id)
            ->where('opportunity_id', $opportunityId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this opportunity.');
        }

        $request->validate([
            'motivation' => 'required|string|max:1000',
        ]);

        Application::create([
            'user_id' => $user->id,
            'opportunity_id' => $opportunityId,
            'motivation' => $request->motivation,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'You have successfully applied for this opportunity.');
    }


}
