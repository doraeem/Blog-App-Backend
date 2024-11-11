<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
     //will return all blogs
    public function index(){       

    }
    //will return a single blog
    public function show(){       

    }
    //store a blog
    public function store(Request $request){
        $Validator = Validator::make($request->all(),[
            'title' => 'required|min:10',
            'author' => 'required|min:3'

        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Please fix the message',
                'errors' => $Validator->errors()

            ]);
        }
        
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->shortDesc = $request->shortDesc;
        $blog->save();

        return response()->json([
            'status' => true,
            'message' => 'Blog added sucessfully.',
            'data' => $blog

        ]);

    }
    //update a blog
    public function update(){
        
    }
    //delete a blog
    public function destroy(){
        
    }
}
