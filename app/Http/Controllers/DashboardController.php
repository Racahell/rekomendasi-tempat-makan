<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TempatMakan;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;

        if ($role == 1) { // Superadmin
            return view('dashboard.superadmin');
        } elseif ($role == 2) { // Owner
            $totalUsers = User::count();
            $totalPlaces = TempatMakan::count();
            // Mock Revenue
            $revenue = "Rp 5.000.000"; 
            return view('dashboard.owner', compact('totalUsers', 'totalPlaces', 'revenue'));
        } elseif ($role == 3) { // Admin
            return view('dashboard.admin');
        } else { // User
            return view('dashboard.user');
        }
    }
}
