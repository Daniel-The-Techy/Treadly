<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


  
    

    public function store(Request $request){
        $category=$request->validate([
            'name'=>'required'
        ]);

        Categories::create([
            'name'=>$category['name']
        ]);
    }
}
