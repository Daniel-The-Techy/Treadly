<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    

    public function index(User $Users, Request $request){
        //$User=User::get();
        return Inertia::render('Dashboard', [
            //'User'=>$User,
            'Count'=>$request->user()->Posts->count(),
           // 'Likes'=>$request->user()->Likes->Count(),
        ]);
    }
}
