<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::with('volunteer','organizations')->paginate(15);
        $totalOpportunities = Opportunity::count();
        $totalDonation = Donation::count();
        $totalVolunteers = User::where('role', 'volunteer')->count();
        $totalOrganization = User::where('role', 'organization')->count();
        return view('admin.dashboard', compact('totalOpportunities','totalDonation','totalVolunteers','totalOrganization','users'));
    }

    public function listUsers(){
        $users = User::with('volunteer','organizations')->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer un compte administrateur.');
        }

        if ($user->role === 'volunteer') {
            if ($volunteer = $user->volunteer) {
                $volunteer->delete();
            }
            $user->applications()->delete();
        } else if ($user->role === 'organization') {
            $user->organizations->delete();
            $user->opportunities->delete();
        }
        $user->donations()->delete();
        $user->conversations()->delete();
        $user->receivedConversations()->delete();
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimer avec succes.');

    }
}
