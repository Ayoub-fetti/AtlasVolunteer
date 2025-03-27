<?php

namespace App\Http\Controllers\organization;
use App\Models\Opportunity;
use App\Models\Organization;
use App\Models\Application;
use App\Models\Volunteer;
use App\Models\Category;
use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpporunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $opportunity = new Opportunity();
        return view('profile.organization.opportunity', compact('categories','locations','opportunity'));

    }
    public function list() {
        $opportunities = Opportunity::with(['categories', 'location'])->get();
        return view('home', compact('opportunities'));
    }

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


        return redirect()->route('opportunity.index')->with('success', 'Opportunity created successfully.');
    }

    public function show(string $id)
    {
        $opportunity = Opportunity::with(['categories', 'location'])->findOrFail($id);
        return view('opportunity_detail', compact('opportunity'));
    }


    public function edit(string $id)
    {
        //
    }

 
    public function update(Request $request, string $id)
    {
        //
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
}
