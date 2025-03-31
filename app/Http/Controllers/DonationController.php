<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{

    // pour lister toutes les donations dans la page principale
    public function index()
    {
        $donations = Donation::with('location')->get();
        return view('donation.donations', compact('donations'));
    }

    // pour lister juste les donations de l'utilisateur
    public function list()
    {
        $user = Auth::user();
        $donations = Donation::where('user_id', Auth::id())->with('location')->get();
        return view('donation.your_donation', compact('user','donations'));
    }

    public function create()
    {
        return view('donation.add');
    }

    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'nullable|exists:locations,id',
        'status' => 'required|in:available,reserved,completed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]); 

       if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('opportunities_images', 'public');
       }

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'status' => $request->input('status'),
            'image' => $validatedData['image'],
        ]);

        return redirect()->route('donation.list')->with('success', 'Donation created successfully.');
    }


    public function show(string $id)
    {
      $donation = Donation::with('location')->findOrFail($id);
      return view('donation.detail', compact('donation'));  
    }

    public function edit(string $id)
    {
      return view('donation.update');  
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|exists:locations,id',
            'status' => 'required|in:available,reserved,completed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]); 
           
        $donation = Donation::findOrFail($id);
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('opportunities_images', 'public');
        }
        $donation->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'status' => $request->input('status'),
            'image' => $validatedData['image'],
        ]);
        return redirect()->route('donation.list')->with('success', 'Donation updated successfully.'); 


    }


    public function destroy(string $id)
    {
        $donation = Donation::findOrFail($id);

        if ($donation->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this donation.');
        }
        $donation->delete();
        $user = Auth::user();
        return redirect()->route('donation.list')->with('success', 'Donation deleted successfully.');
    }
}
