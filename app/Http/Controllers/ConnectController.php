<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConnectController extends Controller
{
    


      public function listUsers(Request $request){

          $search=$request->input('search');

             $user=User::withCount(['followers'])->with('profile', 'following')
             ->where('name', 'like', "%{$search}%")
               ->orwhereHas('profile', function($query) use ($search) {
                $query->where('username', 'like', "%{$search}%");
                 })->paginate(10)->through(function($user) use($request) {
          
            return [
                'id'=>$user->id,
                'name'=>$user->name,
                'Username'=>$user->profile?->Username,
                'image'=>$user->profile?->Photo,
                'followersCount'=>$user->followers_count,
                'status'=>$request->user()->followBy($user->id)

            ];

       

        });
    //  dd($user);

         return Inertia::render('Account/Connect', [
            'users'=>$user
         ]);
      
      }

      public function searchUser(Request $request){
             $user=User::withCount(['followers'])->with('profile', 'following')
        ->paginate(10)->through(function($user) use($request) {
          
            return [
                'id'=>$user->id,
                'name'=>$user->name,
                'Username'=>$user->profile?->Username,
                'image'=>$user->profile?->Photo,
                'followersCount'=>$user->followers_count,
                'status'=>$request->user()->followBy($user->id)

            ];
 
           
    });
}


}
