<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment($validatedData);
        $comment->blog_id = $request->blogId;
        $comment->save();

        return redirect()->route('blogs.show', $request->blogId)->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}

