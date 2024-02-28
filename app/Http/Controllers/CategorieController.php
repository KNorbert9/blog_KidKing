<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategorieController extends Controller
{
    public function categorie()
    {
        $categories['getAllCategories'] = Categorie::getAllCategories();
        return view('backend.categorie.categorie', $categories);
    }

    public function addCategorie()
    {
        return view('backend.categorie.addCategorie');
    }

    public function insert_categorie(Request $request)
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
        $categorie = new Categorie();

        $categorie->name = trim($request->name);
        $categorie->slug = trim($request->slug);
        $categorie->title = trim($request->title);
        $categorie->meta_title = trim($request->meta_title);
        $categorie->meta_description = trim($request->meta_description);
        $categorie->meta_keywords = trim($request->meta_keywords);
        $categorie->status = trim($request->status);

        $categorie->save();

        return redirect('/dashboard/categories')->with('success', 'categorie Added Successfully');
    }


    public function edit_categorie($id)
    {
        $categorie = Categorie::find($id);

        return view('backend.categorie.editCategorie', compact('categorie'));
    }


    public function update_categorie(Request $request, $id)
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


        $categorie = Categorie::find($id);
        $categorie->name = trim($request->name);
        $categorie->slug = trim($request->slug);
        $categorie->title = trim($request->title);
        $categorie->meta_title = trim($request->meta_title);
        $categorie->meta_description = trim($request->meta_description);
        $categorie->meta_keywords = trim($request->meta_keywords);
        $categorie->status = trim($request->status == '1') ? 1 : 0;

        $categorie->save();

        return redirect('/dashboard/categories')->with('success', 'categorie Updated Successfully');
    }

    public function delete_categorie($id)
    {
        $categorie = Categorie::find($id);
        //$categorie->delete();
        $categorie->is_deleted = 1;
        $categorie->save();
        return redirect()->back()->with('success', 'categorie Deleted Successfully');
    }
}
