<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Category;
use App\Models\Location;
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
    public function listDonation() {
        $donations = Donation::with('user','location')->paginate(15);
        return view('admin.donation', compact('donations'));
    }
    public function listOpportunities(){
        $opportunities = Opportunity::with('user','location')->paginate(15);
        return view('admin.opportunity', compact('opportunities'));
    }
    public function listCategories() {
        $categories = Category::paginate(15);
        return view('admin.category', compact('categories'));
    }
    public function listLocations(){
        $locations = Location::paginate(15);
        return view('admin.location', compact('locations'));
    }

    public function deleteDonation($id) {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return view('admin.donation')->with('success', "Donation supprimée avec succès.");
    }
    public function deleteOpportunity($id) {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();
        return view('admin.opportunity')->with('success', "Oppotunité supprimée avec succès.");
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
    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Vous avez supprumer une categories avec succès.');
    } 
    public function deleteLocation($id){
        $locations = Location::findOrFail($id);
        $locations->delete();
        return redirect()->route('admin.locations')->with('success', 'Vous avez supprumer un emplacement avec succès.');
    }


    public function addCategory(Request $request) {
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'vous avez ajouter une categorie avec succès.');
    }
    public function addLocation(Request $request) {
        
        $request->validate([
            'place_name' => 'required|string|max:255',
        ]);

        $location = Location::create([
            'place_name' => $request->place_name,
        ]);

        return redirect()->route('admin.locations')->with('success', 'vous avez ajouter un emplacement avec succès.');
    }

}
