<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Followers;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function index(){
        $Profile=Profile::get();
        $Country=DB::table('oc_country')->select('name');
        return Inertia::render('Profile', [
               'Profiles'=>$Profile,
               'Country'=>$Country
        ]);
    }

    public function action(User $user, Request $request, Profile $profile){
     //   dd($profile->user->id);
        $user1 = User::find(318129);
        $user2 = User::find(665371);
     //   dd($user->followBy($request->user()));
      //  if(!$user->followBy($request->user())){
            $action=$request->user()->following()->toggle($profile->user->id);
     //   }else{
         //   $user1->following()->detach($user2->id);
    //    }
      //  dd($action);

    }

    public function showProfile(Request $request, Profile $profile, User $user){
        
        $user_id=$profile->id ?? $request->user()->Profile->id;

       $Profiles= Profile::where('id', $user_id)->get();

       $status=$user->followBy($request->user());

       $Auth=$profile->id ? True : false;

    //  dd($request->user()->following->count());

       $FollowersCount=$profile->id ? $profile->User->followers->count() : $request->user()->followers->count();
       
       $FollowingCount=$profile->id ? $profile->User->following->count() : $request->user()->following->count();

       $PostCount=$profile->id ? $profile->User->Posts->count() : $request->user()->Posts->count();
       
        
    // dd($profile->User->followers->count());

       return Inertia::render('Account/Profile', [
           'Profile'=>$Profiles,
           'Status'=>$status,
           'FollowersCount'=>$FollowersCount,
           'Auth'=>$Auth,
           'FollowingCount'=>$FollowingCount,
           'PostCount'=>$PostCount
       ]);
    }


    public function store(Request $request){
         $Profile=$request->validate([
          'Username'=>'required|string',
          'Bio'=>'required',
          'About'=>'required',
          'contact'=>'required',
           'Photo'=>'required',
           'skills'=>'required',
           'Profession'=>'required',
           'Country'=>'required',
            'Cover_image'=>'required'
         ]);

         if(isset($Profile['Photo'])){
         $Photo=$this->saveImage($Profile['Photo']);
         $CoverImage=$this->saveImage($Profile['Cover_image']);
         $Profile['Photo']=$Photo;
         $Profile['Cover_image']=$CoverImage;
         };


         //Check if image already exist in the Filesystem 
         $image=$request->user()->Photo;

         if($image){
            $absolutePath=public_path($image);
            File::delete($absolutePath);
         }



         $request->user()->Profile()->updateOrCreate([
            'Username'=>$Profile['Username'],
            'Bio'=>$Profile['Bio'],
            'About'=>$Profile['About'],
            'contact'=>$Profile['contact'],
            'Photo'=>$Profile['Photo'],
            'skills'=>$Profile['skills'],
            'Country'=>$Profile['Country'],
            'Profession'=>$Profile['Profession'],
            'Cover_image'=>$Profile['Cover_image'],
         ]);

         return back()->with('ProfileStatus', 'Profile Successfully created');
    }

    public function saveImage($image){

        if(preg_match('/^data:image\/(\w+);base64,/', $image, $match)){

            $image=substr($image, strpos($image, ',') + 1);

            $type=strtolower($match[1]);

            if(!in_array($type, ['jpg', 'png', 'jpeg'])){
                throw new Exception('base encoded failed');
            }
            $image=str_replace(' ', '+', $image);
            $image=base64_decode($image);

            if($image == false){
                throw new Exception('please provide a valid image');
            }


        }else{
            throw new Exception('did not match data URL with image data');
        }

        $dir='images/';
        $file=Str::random(). '.' .$type;
        $absolutePath=public_path($dir);
        $relativePath=$dir . $file;

        if(!File::exists($absolutePath)){
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
     }

}
