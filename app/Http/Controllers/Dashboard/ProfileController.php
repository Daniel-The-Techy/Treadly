<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    
    public function index(){
        $userProfiles=Auth::user()->Profile;
        
          return Inertia::render('Account/About', [
            'Profile'=>$userProfiles
          ]);
    }
}
