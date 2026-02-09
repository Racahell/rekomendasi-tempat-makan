<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatMakan;

class HomeController extends Controller
{
    public function index()
    {
        $places = TempatMakan::latest()->take(6)->get();
        return view('welcome', compact('places'));
    }

    public function showPlace($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view details.');
        }
        
        $place = TempatMakan::findOrFail($id);
        return view('places.show', compact('place'));
    }
}
