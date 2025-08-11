<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\Followed;
use App\Models\post_views;
use Exception;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\Followers;
use Illuminate\Support\Str;
use Facades\App\Service\ViewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UserProfileRequest;

use function Termwind\render;

class UserProfileController extends Controller
{

     private $status;

    public function index(){
        $Profile=Profile::get();
        $Country=DB::table('oc_country')->select('name');
        return Inertia::render('Profile', [
               'Profiles'=>$Profile,
               'Country'=>$Country
        ]);
    }

    public function action(Request $request,  User $user){
            $action=$request->user()->following()->toggle($user->id);
               if(!empty($action['attached'])){
                   event(new Followed($request->user(), $user, $user));
               }
    }

    public function showProfile(Request $request, Profile $profile, User $user, Posts $posts, post_views $post_views){
          
        $users=$profile->user_id ?? $request->user()->id ;
        $user_id=$profile->id ?? $request->user()->Profile->id;

       // dd($profile->id);
   
       $authUser=auth()->user();

       $Profiles=User::with(['profile' => function($q) use ($user_id) {
         $q->where('id', $user_id);
       }])->find($users);

     //  dd($Profiles);


       $FollowingId=$authUser->following()->pluck('users.id');

       $followersId=$authUser->followers()->pluck('users.id')->toArray();

    

         
       $statusList=[];

       foreach($FollowingId as $userId) {
           $statusList[$userId]=in_array($userId, $followersId);
       }

      
       
        $profile_User_Id=$profile->user_id ?? $request->user()->profile->user_id;

        $Auth=$user->profileOwner($request->user()->id, $profile_User_Id);



        $followingStatus=$request->user() ?? $user->followBy($profile->user->id);
    

       $FollowersCount=$profile->id ? $profile->User->followers->count() : $request->user()->followers->count();
       
       $FollowingCount=$profile->id ? $profile->User->following->count() : $request->user()->following->count();

       $PostCount=$profile->id ? $profile->User->Posts->count() : $request->user()->Posts->count();

       $MainId=$profile->user_id ?? $request->user()->id;

        $Following=User::with([ 'Profile'])->find($MainId)->followers()->get()->map( fn($user) => [
            'id'=>$user->id,
            'Username'=>$user->profile->Username,
            'image'=>$user->profile->Photo,
            'name'=>$user->name,
            
         ]);
         
         $post=User::with(['Posts' => function ($query) use ($MainId){
            $query->withCount(['Likes', 'views', 'comment'])->withExists(['likes as liked_by_auth_user' => function($q) use ($MainId) {
                $q->where('user_id', $MainId);
            }]);
         }])->findOrFail($MainId);
   

       return Inertia::render('Account/Profile', [
           'userProfile'=>$Profiles,
          'status'=>$statusList,
           'FollowersCount'=>$FollowersCount,
           'Auth'=>$Auth,
           'FollowingCount'=>$FollowingCount,
           'PostCount'=>$PostCount,
           'Followings'=>$Following,
           'Post'=>$post,
           'followingStatus'=>$followingStatus

       ]);
    }


    public function store(UserProfileRequest $request){
         $Profile=$request->validated();

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

        //Replace whitespace with underscore in username and append tag to each profile username created
        if(isset($profile['Username'])){
            $newUsername=str_replace(' ', '_', $Profile['Username']);
            $userNameWithTag='@'.$newUsername;
            $profile['Username']=$userNameWithTag;
        }

         $request->user()->Profile()->updateOrCreate(
            ['id'=>$request->id],
            [
            'Username'=>$Profile['Username'],
            'Bio'=>$Profile['Bio'],
            'About'=>$Profile['About'],
            'contact'=>$Profile['contact'],
            'Photo'=>$Profile['Photo'],
            'skills'=>$Profile['skills'],
            'Country'=>$Profile['Country'],
            'Profession'=>$Profile['Profession'],
            'Cover_image'=>$Profile['Cover_image'],
            ],

          
            
        
        
        );

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
