<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $User=User::get();
        return Inertia::render('User/Show', [
            'User'=>$User
        ]);
    }

    public function Set(){
        $User=User::get();
        return Inertia::render('Test/Test', [
            'User'=>$User
        ]);
    }
}
