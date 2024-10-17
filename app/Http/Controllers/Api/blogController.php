<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class blogController extends Controller
{
    //
    public function createBlog(Request $request)
    {   
        // methods: create(), all(), findOrFall(), update(), delete()

        $validateData = $request->validate([
            "tittle" => 'required|string|max:255',
            "content" => 'required|string|max:255',
            "comment" => 'required|string|max:255',
        ]);

        $blog = Blog::create($validateData);

        if ($blog) {
            return response()->json([
                'message' => 'Blog created successfully',
                'data' => $blog
            ], 201);
        } else {
             return response()->json([
                'message' => 'Something went wrong',
                'data' => 'error'
            ], 500);
        }
        
    }

    public function getAllBlog() {
        $blog = Blog::all();

        if ($blog) {
            return response()->json([
                'message' => 'Blog retrieved successfully',
                'data' => $blog
            ], 200);
    } else {
        return response()->json([
            'message' => 'Blog not found',
            'data' => 'error'
        ], 500);
    }
    }

    public function getABlog($id)
    {
       $blog = Blog::findOrFail($id);
        if ($blog) {
            return response()->json([
                'message' => 'Blog retrieved successfully',
                'data' => $blog
            ], 200);
    } else {
        return response()->json([
            'message' => 'Blog not found',
            // 'data' => 'error'
        ], 404);
    }
    }

    public function updateABlog(Request $request, $id)
    {
     $blog = Blog::find($id);
      $blog->update($request->all());

       if ($blog) {
            return response()->json([
                'message' => 'Blog updated successfully',
                'data' => $blog
            ], 200);
    } else {
        return response()->json([
            'message' => 'Blog not found',
            // 'data' => 'error'
        ], 404);
    }

    }

     public function deleteABlog($id)
    {
     $blog = Blog::find($id);
      $blog->delete();

       if ($blog) {
            return response()->json([
                'message' => 'Blog deleted successfully',
                'data' => $blog
            ], 200);
    } else {
        return response()->json([
            'message' => 'Blog not found',
            // 'data' => 'error'
        ], 404);
    }

    }
}
