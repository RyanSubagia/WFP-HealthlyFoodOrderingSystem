<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //RAAW
        // $category = DB::select("select * from categories");
        //var_dump($category);exit;
        // print_r($category);exit;
        // dd($category);

        //Queery Builder
        // $allCategories = DB::table("categories")->get();
        // dd($allCategories);

        //Eloquent
        $category = Category::all();
        // dd($category);
        //dd cuma ada di laravel

        //method 1
        return view('categories.index',compact('category'));
        //method 2
        // return view('category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
