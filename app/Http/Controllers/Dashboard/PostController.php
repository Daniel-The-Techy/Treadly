<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class PostController extends Controller
{

    public function showCategory(){
        $Category=Categories::get();
        return Inertia::render('Posts', [
           'Categorys'=>$Category
        ]);
    }
    
    public function store(Request $request){
        $Post=$request->validate([
            'title'=>'required',
            'content'=>'required',
            'status'=>'required',
            'Categories_id'=>'required',
            'Cover_image'=>'required'
        ]);

       if(isset($Post['Cover_image'])){
          $image=$this->saveImage($Post['Cover_image']);
          $Post['Cover_image']=$image;
       }

         //Check if image already exist in the Filesystem 
         $image=$request->user()->Cover_image;

         if($image){
            $absolutePath=public_path($image);
            File::delete($absolutePath);
         }

         //check if category name exist if yes insert its id to the Post table

         $value=$request->input('Categories_id');
         $Category=Categories::where('name', $value)->first();

         // dd($Category->id);


        $request->user()->Posts()->create([
            'title'=>$Post['title'],
            'content'=>$Post['content'],
            'status'=>$Post['status'],
            'Cover_image'=>$Post['Cover_image'],
            'Categories_id'=>$Category->id,
        ]);

        return back()->with('PostStatus', 'Post Successfully Published');

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


     public function show(Posts $post){
     //   dd($post);
        return Inertia::render('Account/Post', [
           'posts' =>$post
        ]);
     }

      
}
