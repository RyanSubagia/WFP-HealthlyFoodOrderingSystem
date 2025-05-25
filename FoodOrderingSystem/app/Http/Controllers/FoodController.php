<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent
        $foods = Food::all();
        $category = Category::all();

        //method 1
        return view('admin.products.product',compact('foods','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.product',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Food();
        $data->name = $request->get('name');
        $data->nutrition_fact = $request->get('nutrition_fact');
        $data->description = $request->get('description');
        $data->price = $request->get('price');
        $data->category_id = $request->get('category_id');
        $data->save();

        return redirect()->route('product_admin')->with('status','Success updated data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $current_food = Food::find($id);
        return view("foods.show",compact("current_food"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $listmakanan)
    {
        return view('admin.products.editForm', compact('listmakanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $listmakanan)
    {
        $listmakanan->name = $request->name;
        $listmakanan->save();
        return redirect()->route("product_admin")->with("status","Update success!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $foods = Food::find($id);
        $foods->delete();
        
        return response()->json(array(
            "status" =>"oke",
            "msg"=>"Delete success!"
        ),200);
    }
    public function DetailProduct()
    {
        $prod = Food::orderBy('id', 'asc')->paginate(7);
        $category = Category::all();
        return view("admin.products.product",  ["food" => $prod, "category" => $category]);
    }
    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Food::find($id);
        $category = Category::all();

        return response()->json([
            'status' => 'oke',
            'msg' => view('admin.products.editForm', compact('data', 'category'))->render()
        ], 200);
    }


    public function saveDataUpdate(Request $request)
    {
        $id = $request->id;
        $data = Food::find($id);
        $data->nutrition_fact = $request->nutrition_fact;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->save();

        return response()->json(['status' => 'oke', 'msg' => 'Data berhasil di-update!'], 200);
    }

}
