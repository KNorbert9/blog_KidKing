<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $Blog->categorie_id = $request->categorie_id;
        $Blog->description = trim($request->description);
        $Blog->status = trim($request->status);
        $Blog->is_publish = trim($request->is_publish);

        $slug = Str::slug($request->title);

        $checkSlug = Blog::where('slug', '=', $slug)->first();

        if (!empty($checkSlug)) {
            $checkSlug = $slug . '-' . $Blog->id;
        } else {
            $checkSlug = $slug;
        }

        $Blog->slug = $checkSlug;

        if (/* $request->hasFile('image') */!empty($request->file('image'))) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/blog/', $filename);
            $Blog->image = $filename;
        }

        $Blog->save();

        return redirect('/dashboard/blogs')->with('success', 'Blog Added Successfully');
    }


    public function edit_Blog($id)
    {
        $Blog = Blog::find($id);
        $categorie = Categorie::getAllCategories();

        return view('backend.Blog.editBlog', compact('Blog', 'categorie'));
    }


    public function update_Blog(Request $request, $id)
    {

        $Blog = Blog::find($id);

        $Blog->title = trim($request->title);
        $Blog->categorie_id = trim($request->categorie_id);
        $Blog->description = trim($request->description);
        $Blog->status = trim($request->status);
        $Blog->is_publish = trim($request->is_publish);


        if (!empty($request->file('image'))) {
            // Check if the current image exists and delete it
            if (!empty($Blog->image) && Storage::exists('upload/blog/' . $Blog->image)) {
                Storage::delete('upload/blog/' . $Blog->image);
            }

            // Upload and save the new image
            $file = $request->file('image');

            // Check if the file is valid
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/blog/', $filename);
                $Blog->image = $filename;
            } else {
                // Handle the case where the file is not valid
                return redirect('/dashboard/blogs')->with('error', 'Invalid file uploaded');
            }
        }

        $Blog->save();

        return redirect('/dashboard/blogs')->with('success', 'Blog Updated Successfully');
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
