<?php

namespace App\Http\Controllers\organization;
use App\Models\Opportunity;
use App\Models\Organization;
use App\Models\Application;
use App\Models\Volunteer;
use App\Models\Category;
use App\Models\Location;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ApplicationStatusUpdatedNotification;
use App\Notifications\NewOpportunityNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpporunityController extends Controller
{

    public function index()
    {   
        
        $user = Auth::user();
        if ($user->role !== 'organization') {
            return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
        }

        
        $opportunities = Opportunity::where('user_id', Auth::id())->with(['categories', 'location'])->get();
        $organization = Organization::where('user_id', Auth::id())->first();

        return view('profile.organization.profile', compact('organization', 'user','opportunities'));
    }
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $opportunity = new Opportunity();
        return view('profile.organization.opportunity', compact('categories','locations','opportunity'));

    }
    public function list() {
        $opportunities = Opportunity::with(['categories', 'location'])->paginate(10);
        return view('home', compact('opportunities'));
    }


    public function store(Request $request)
    {
        
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category' => 'required|numeric|exists:categories,id',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'start_time' => 'date_format:H:i',
                'end_time' => 'date_format:H:i',
                'location' => 'required|exists:locations,id',
                'state' => 'nullable|string',
                'country' => 'required|string',
                'required_volunteers' => 'required|integer|min:1',
                'status' => 'required|in:open,closed,completed,canceled',
            ]);


            // Handle file upload for 'cover'
            if ($request->hasFile('cover')) {
                $validatedData['cover'] = $request->file('cover')->store('opportunities_covers', 'public');
            }


            // Create the opportunity
            $opportunity = Opportunity::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'cover' => $validatedData['cover'] ?? null,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'location_id' => $request->location,
                'state' => $request->state,
                'country' => $request->country,
                'required_volunteers' => $request->required_volunteers,
                'is_remote' => $request->is_remote ?? true,
                'status' => $request->status,
            ]);
            // Envoyer une notification a tous les benevoles
            $volunteers = User::where('role','volunteer')->where('email_verified_at','!=',null)->get();
            
            // foreach ($volunteers as $volunteer) {
            //     $volunteer->notify(new NewOpportunityNotification($opportunity));
            // }


            return redirect()->route('opportunity.index')->with('success', 'Opportunity created successfully and volunteers have been notified');
    }

    public function show(string $id)
    {
        $opportunity = Opportunity::with(['categories', 'location','organization'])->findOrFail($id);
        return view('opportunity_detail', compact('opportunity'));
    }


    public function edit(string $id)
    {
        $opportunity = Opportunity::with(['categories', 'location'])->findOrFail($id);
        $categories = Category::all();
        $locations = Location::all();
        $user = Auth::user();
        return view('profile.organization.update', compact('opportunity','categories','locations','user'));
    }

 
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|numeric|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'nullable|exists:locations,id',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'required_volunteers' => 'nullable|integer|min:1',
            'status' => 'required|in:open,closed,completed,canceled',
        ]);
    
        // Trouver l'opportunité
        $opportunity = Opportunity::findOrFail($id);
    
    
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('opportunities_covers', 'public');
            $opportunity->cover = $coverPath;
        }
    
        // Mettre à jour les données de l'opportunité
        $opportunity->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location_id' => $request->location,
            'state' => $request->state,
            'country' => $request->country,
            'required_volunteers' => $request->required_volunteers,
            'status' => $request->status,
        ]);
    
        return redirect()->route('opportunity.index')->with('success', 'Opportunity updated successfully.');
    }

    public function destroy(string $id)
    {
        $opportunity = Opportunity::findOrFail($id);

        if ($opportunity->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this opportunity.');
        }
        $opportunity->delete();
        $user = Auth::user();
        return redirect()->route('opportunity.index')->with('success', 'Opportunity deleted successfully.');
    }

    public function applications($id){
        $opportunity = Opportunity::with(['applications','user'])->findOrFail($id);
        $applications = $opportunity->applications;

        return view('profile.organization.applications', compact('opportunity', 'applications'));
    }

    public function manage($applicationId){
        
        $application = Application::findOrFail($applicationId);
        return view('profile.organization.manage', compact('application'));
    }

    public function management(Request $request, $applicationId)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
            'approved_at' => 'nullable|date',
            'hours_served' => 'nullable|integer|min:0',
            'completed_at' => 'nullable|date',
        ]);

        $application = Application::findOrFail($applicationId);
        $oldStatus = $application->status;
        $opportunity = Opportunity::findOrFail($application->opportunity_id);

        $application->update([
            'status' => $request->status,
            'approved_at' => $request->approved_at,
            'hours_served' => $request->hours_served,
            'completed_at' => $request->completed_at,
        ]);

        $application->load('opportunity', 'user');
        
        // Update the registered_volunteers count when the application is approved
        if ($request->status === 'approved' && $oldStatus !== 'approved') {
            // Increment registered_volunteers count
            $opportunity->increment('registered_volunteers');
        } 
        // If the application was previously approved but now rejected, decrement the count
        elseif ($oldStatus === 'approved' && $request->status !== 'approved') {
            // Make sure not to go below zero
            if ($opportunity->registered_volunteers > 0) {
                $opportunity->decrement('registered_volunteers');
            }
        }

        // Only send notification if status has changed
        if ($oldStatus !== $request->status) {
            $application->user->notify(new ApplicationStatusUpdatedNotification($application));
            return redirect()->back()->with('success', 'Application status updated successfully and volunteer has been notified.');
        }

        return redirect()->back()->with('success', 'Application updated successfully and volunteer has been notified.');
    }

}