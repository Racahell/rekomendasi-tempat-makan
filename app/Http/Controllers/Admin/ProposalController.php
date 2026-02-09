<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsulanTempat;
use App\Models\TempatMakan;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = UsulanTempat::where('status', 'pending')->latest()->get();
        return view('admin.proposals.index', compact('proposals'));
    }

    public function edit($id)
    {
        $proposal = UsulanTempat::findOrFail($id);
        return view('admin.proposals.edit', compact('proposal'));
    }

    public function update(Request $request, $id)
    {
        $proposal = UsulanTempat::findOrFail($id);
        $proposal->update($request->except(['_token', '_method']));
        return redirect()->route('admin.proposals.index')->with('success', 'Proposal updated');
    }

    public function approve($id)
    {
        $proposal = UsulanTempat::findOrFail($id);
        
        // Move to TempatMakan
        TempatMakan::create([
            'name' => $proposal->name,
            'description' => $proposal->description,
            'address' => $proposal->address,
            'price_min' => $proposal->price_min,
            'price_max' => $proposal->price_max,
            'phone' => $proposal->phone,
            'created_by' => $proposal->proposed_by,
            'updated_by' => Auth::id(),
        ]);

        $proposal->update([
            'status' => 'approved',
            'approved_by' => Auth::id()
        ]);

        return redirect()->route('admin.proposals.index')->with('success', 'Place approved and went live!');
    }

    public function reject(Request $request, $id)
    {
        $proposal = UsulanTempat::findOrFail($id);
        $proposal->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason,
            'approved_by' => Auth::id()
        ]);

        return redirect()->route('admin.proposals.index')->with('success', 'Proposal rejected');
    }
}
