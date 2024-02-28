<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function Blog()
    {
        $Blogs['getAllBlogs'] = Blog::getAllBlogs();
        return view('backend.Blog.Blog', $Blogs);
    }

    public function addBlog()
    {
        $categorie = Categorie::getAllCategories();
        return view('backend.Blog.addBlog', compact('categorie'));
    }

    public function insert_Blog(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'title' => 'required',
        //     'meta_title' => 'required',
        //     'meta_description' => 'required',
        //     'meta_keywords' => 'required',
        //     'status' => 'required',
        // ]);


        $Blog = new Blog();

        $Blog->user_id = Auth::user()->id;
        $Blog->title = trim($request->title);
        $Blog->categorie_id = trim($request->title);
        $Blog->description = trim($request->description);
        $Blog->status = trim($request->status);

        $slug = Str::slug($request->title);

        $checkSlug = Blog::where('slug', '=', $slug)->first();

        if (!empty($checkSlug)) {
            $checkSlug = $slug . '-' . $Blog->id;
        } else {
            $checkSlug = $slug;
        }

        $Blog->slug = $checkSlug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/blog/', $filename);
            $Blog->image = $filename;
        }

        $Blog->save();

        return redirect('/dashboard/Blogs')->with('success', 'Blog Added Successfully');
    }


    public function edit_Blog($id)
    {
        $Blog = Blog::find($id);

        return view('backend.Blog.editBlog', compact('Blog'));
    }


    public function update_Blog(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'status' => 'required',
        ]);


        $Blog = Blog::find($id);
        $Blog->name = trim($request->name);
        $Blog->slug = trim($request->slug);
        $Blog->title = trim($request->title);
        $Blog->meta_title = trim($request->meta_title);
        $Blog->meta_description = trim($request->meta_description);
        $Blog->meta_keywords = trim($request->meta_keywords);
        $Blog->status = trim($request->status == '1') ? 1 : 0;

        $Blog->save();

        return redirect('/dashboard/Blogs')->with('success', 'Blog Updated Successfully');
    }

    public function delete_Blog($id)
    {
        $Blog = Blog::find($id);
        //$Blog->delete();
        $Blog->is_deleted = 1;
        $Blog->save();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }
}
