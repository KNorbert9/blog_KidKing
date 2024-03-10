<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function teams()
    {
        return view('frontend.teams');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function blog()
    {
        $data = Blog::getBlogs();
        return view('frontend.blog', compact('data'));
    }

    public function blogDetail($slug)
    {
        $getCategory = Categorie::getSlug($slug);
        if (!empty($getCategory)) {
            $metaTitle = $getCategory->meta_title;
            $metaDescription = $getCategory->meta_description;
            $metaKeyword = $getCategory->meta_keywords;
            $data = Blog::getBlogsCategories($getCategory->id);
            return view('frontend.blog', compact('data', 'metaTitle', 'metaDescription', 'metaKeyword'));
        } else {

            $getRecord = Blog::getBlogBySlug($slug);
            if (!empty($getRecord)) {
                $category = Categorie::getAllCategories();
                $data['getRecord'] = $getRecord;
                $getRecentPost = Blog::getRecentPost();
                // $metaTitle = $getCategory->meta_title;
                // $metaDescription = $getCategory->meta_description;
                // $metaKeyword = $getCategory->meta_keywords;
                $getRelatedPost = Blog::getRelatedPost($getRecord->categorie_id, $getRecord->id);
                return view('frontend.blogDetail', compact('getRecord', 'category', 'getRecentPost', 'getRelatedPost'));
            } else {
                abort(404);
            }
        }
    }


    public function comment_submit(Request $request)
    {
        $save = new Comment;

        $save->user_id = Auth::user()->id;
        $save->comment = $request->comment;
        $save->blog_id = $request->blog_id;
        $save->save();

        return redirect()->back()->with('succes', "Comment created successfully");
    }
}
