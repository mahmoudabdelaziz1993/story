<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function show($id){
       $cat= (new \App\category)->find($id);
        $ps= $cat->posts;
      return view('profile')->with(['ps'=>$ps]);
    }
}
