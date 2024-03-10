<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function page()
    {
        $pages['Pages'] = Page::getAllPages();
        return view('backend.page.page', $pages);
    }

    public function addPage()
    {
        return view('backend.page.addPage');
    }

    public function insert_page(Request $request)
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


        $Page = new Page();

        $Page->title = trim($request->title);
        $Page->description = trim($request->description);
        $Page->meta_title = trim($request->meta_title);
        $Page->meta_description = trim($request->meta_description);
        $Page->meta_keywords = trim($request->meta_keywords);

        $slug = Str::slug($request->title);

        $checkSlug = Page::where('slug', '=', $slug)->first();

        if (!empty($checkSlug)) {
            $checkSlug = $slug . '-' . $Page->id;
        } else {
            $checkSlug = $slug;
        }

        $Page->slug = $checkSlug;

        $Page->save();

        return redirect('/dashboard/pages')->with('success', 'Page Added Successfully');
    }


    public function edit_page($id)
    {
        $Page = Page::find($id);

        return view('backend.Page.editPage', compact('Page'));
    }


    public function update_page(Request $request, $id)
    {

        $Page = Page::find($id);

        $Page->title = trim($request->title);
        $Page->description = trim($request->description);
        $Page->meta_title = trim($request->meta_title);
        $Page->meta_description = trim($request->meta_description);
        $Page->meta_keywords = trim($request->meta_keywords);

        $Page->save();

        return redirect('/dashboard/pages')->with('success', 'Page Updated Successfully');
    }

    // public function delete_Blog($id)
    // {
    //     $Page = Blog::find($id);
    //     //$Page->delete();
    //     $Page->is_deleted = 1;
    //     $Page->save();
    //     return redirect()->back()->with('success', 'Blog Deleted Successfully');
    // }

}
