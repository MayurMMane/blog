<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;

class BlogController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    //blog index here
    public function index()
    {
        $user_id = auth()->id();
        $blogs = Blog::where('user_id', $user_id)->get();
        return view('blogs.index', compact('blogs'));
    }
    //blog show create page here
    public function create()
    { 
        $categories = Category::all();
        return view('blogs.create',compact('categories'));
    }
    //blog store here
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:blogs,title,NULL,id,user_id,' . auth()->id(),
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $validatedData['user_id'] = auth()->id();
        Blog::create($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }
    //blog show here
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }   
    //blog Edit here        
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }
    //blog update here
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:blogs,title,' . $blog->id . ',id,user_id,' . auth()->id(),
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $blog->update($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }
    //blog delete here
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
    //show all blog here
    public function showAllBlogs()
    {
        $user_id = auth()->id();
        $blogs = Blog::with('comments')->where('user_id', $user_id)->get();

        return view('blogs.all_blogs', compact('blogs'));
    }
}