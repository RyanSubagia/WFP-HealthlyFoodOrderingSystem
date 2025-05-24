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

        return view('admin.categories.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('category_admin')->with('status','Success updated data!');
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
    public function edit(Category $listkategori)
    {
        return view('admin.categories.editForm', compact('listkategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $listkategori)
    {
        $listkategori->name = $request->name;
        $listkategori->save();
        return redirect()->route("category_admin")->with("status","Update success!");
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();
        
        return response()->json(array(
            "status" =>"oke",
            "msg"=>"Type data is removed"
        ),200);  
    }

    public function DetailCategory()
    {
        $cat = Category::orderBy('id', 'asc')->paginate(7);
        return view("admin.categories.category",  ["category" => $cat]);
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

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(array(
          'status' => 'oke',
          'msg' => view('admin.categories.editForm', compact('data'))->render()
           ),200);
    }

    public function saveDataUpdate(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();
        return response()->json(array('status' => 'oke', 'msg' => 'type data is up-to-date !'), 200);
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
