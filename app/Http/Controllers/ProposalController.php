<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsulanTempat;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'price_min' => 'nullable|numeric',
            'price_max' => 'nullable|numeric',
            'phone' => 'nullable|string',
        ]);

        UsulanTempat::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'price_min' => $request->price_min,
            'price_max' => $request->price_max,
            'phone' => $request->phone,
            'status' => 'pending',
            'proposed_by' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Proposal submitted successfully!');
    }
}
