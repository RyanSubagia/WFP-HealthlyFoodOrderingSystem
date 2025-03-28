<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //RAAW
        // $foods = DB::select("select * from foods");
        //var_dump($foods);exit;
        // print_r($foods);exit;
        // dd($foods);

        //Queery Builder
        // $allFoods = DB::table("foods")->get();
        // dd($allFoods);

        //Eloquent
        $foods = Food::all();
        // $foods = $foods->sortBy('price');
        // dd($foods);
        //dd cuma ada di laravel

        // coba" di kelas
        // $data1 = Food::where('id',1)->get();
        // $data1 = Food::find(1);
        // dd($data1);

        //method 1
        return view('foods.index',compact('foods'));
        //method 2
        // return view('foods.index',['foods'=>$foods]);
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
    public function show(string $id)
    {
        $current_food = Food::find($id);
        return view("foods.show",compact("current_food"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }
}
