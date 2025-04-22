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
        //Eloquent
        $category = Category::all();

        return view('admin.category',compact('category'));
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

    public function DetailCategory()
    {
        $cat = Category::orderBy('id', 'asc')->paginate(7);
        return view("admin.category",  ["category" => $cat]);
    }

    public function showListFoods()
    {
        $category = Category::find($_POST['idcat']);
        $name = $category->name;
        $data = $category->foods;
        return response()->json(array(
                'status' => 'oke',
                'title' => $name.' Food List',
                'body' => view('admin.showListFoods', compact('name', 'data'))->render()
              ), 200);
    }



    public function showHighestFoods() {
        $highestFoodCategory = Category::withCount('foods')
        ->orderByDesc('foods_count')
        ->first(); 
    
        return response()->json(array(
                'status' => 'oke',
                'msg' => "<div class='alert alert-danger'>
                The highest amount of food is  <b>".$highestFoodCategory->name."</b></div>"
            ), 200);
    }

    // public function showLowestCalorie() {
    //     $highestFoodCategory = Category::withCount('foods')
    //     ->orderByDesc('foods_count')
    //     ->first(); 
    
    //     return response()->json(array(
    //             'status' => 'oke',
    //             'msg' => "<div class='alert alert-danger'>
    //             The highest amount of food is  <b>".$highestFoodCategory->name."</b></div>"
    //         ), 200);
    // }
}
