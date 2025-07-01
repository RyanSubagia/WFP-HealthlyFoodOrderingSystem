<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use App\Models\NutritionFact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request) // <-- Add Request
    {
        $query = Food::query();

        // Check for search input
        if ($request->has('search') && $request->input('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
        }

        $food = $query->with(['nutritionFact', 'category'])->get();
        $category = Category::all();

        return view('customer.menu', compact('food', 'category'));
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
        // Mulai database transaction
        DB::beginTransaction();
        
        try {
            // Simpan data food
            $data = new Food();
            $data->name = $request->get('name');
            $data->description = $request->get('description');
            $data->price = $request->get('price');
            $data->category_id = $request->get('category_id');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('menu_sushi', 'public');
                $data->image = basename($imagePath); // simpan hanya nama filenya
            }
            $data->save();

            // Simpan nutrition facts jika ada data
            if ($this->hasNutritionData($request)) {
                $nutritionFact = new NutritionFact();
                $nutritionFact->food_id = $data->id;
                $nutritionFact->calories = $request->get('calories');
                $nutritionFact->protein = $request->get('protein');
                $nutritionFact->fat = $request->get('fat');
                $nutritionFact->carbohydrates = $request->get('carbohydrates');
                $nutritionFact->fiber = $request->get('fiber');
                $nutritionFact->save();
            }

            DB::commit();
            return redirect()->route('admin.product_admin')->with('status','Success created data!');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $current_food = Food::with('nutritionFact')->find($id);
        return view("foods.show",compact("current_food"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $listmakanan)
    {
        $listmakanan->load('nutritionFact'); 
        return view('admin.products.editForm', compact('listmakanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $listmakanan)
    {
        DB::beginTransaction();
        
        try {
            $listmakanan->name = $request->name;
            $listmakanan->description = $request->description ?? $listmakanan->description;
            $listmakanan->price = $request->price ?? $listmakanan->price;
            $listmakanan->category_id = $request->category_id ?? $listmakanan->category_id;
            
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('menu_sushi', 'public');
                $listmakanan->image = basename($imagePath);
            }
            
            $listmakanan->save();

            // Update atau create nutrition facts
            if ($this->hasNutritionData($request)) {
                $nutritionData = [
                    'calories' => $request->get('calories'),
                    'protein' => $request->get('protein'),
                    'fat' => $request->get('fat'),
                    'carbohydrates' => $request->get('carbohydrates'),
                    'fiber' => $request->get('fiber'),
                ];

                // Update atau create nutrition fact
                NutritionFact::updateOrCreate(
                    ['food_id' => $listmakanan->id],
                    $nutritionData
                );
            }

            DB::commit();
            return redirect()->route("admin.product_admin")->with("status","Update success!");
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $id = $request->id;
            $foods = Food::with('nutritionFact')->find($id);
            
            // Hapus nutrition facts terlebih dahulu (jika ada)
            if ($foods && $foods->nutritionFact) {
                $foods->nutritionFact->delete();
            }
            
            // Hapus food
            if ($foods) {
                $foods->delete();
            }
            
            DB::commit();
            
            return response()->json(array(
                "status" => "oke",
                "msg" => "Delete success!"
            ), 200);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(array(
                "status" => "error",
                "msg" => "Failed to delete: " . $e->getMessage()
            ), 500);
        }
    }

    public function DetailProduct(Request $request) // <-- Add Request
    {
        $query = Food::query();

        // Add the same search logic
        if ($request->has('search') && $request->input('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $prod = $query->with(['nutritionFact', 'category'])
                      ->orderBy('id', 'asc')
                      ->paginate(7); // Keep using paginate

        $category = Category::all();
        
        return view("admin.products.product", ["food" => $prod, "category" => $category]);
    }


    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Food::with('nutritionFact')->find($id);
        $category = Category::all();

        return response()->json([
            'status' => 'oke',
            'msg' => view('admin.products.editForm', compact('data', 'category'))->render()
        ], 200);
    }

    public function saveDataUpdate(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $id = $request->id;
            $data = Food::find($id);
            
            // Update food data
            $data->name = $request->name ?? $data->name;
            $data->description = $request->description ?? $data->description;
            $data->price = $request->price ?? $data->price;
            $data->category_id = $request->category_id ?? $data->category_id;
            
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('menu_sushi', 'public');
                $data->image = basename($imagePath);
            }
            
            $data->save();

            // Update nutrition facts jika ada data
            if ($this->hasNutritionData($request)) {
                $nutritionData = [
                    'calories' => $request->get('calories'),
                    'protein' => $request->get('protein'),
                    'fat' => $request->get('fat'),
                    'carbohydrates' => $request->get('carbohydrates'),
                    'fiber' => $request->get('fiber'),
                ];

                NutritionFact::updateOrCreate(
                    ['food_id' => $data->id],
                    $nutritionData
                );
            }

            DB::commit();
            return response()->json(['status' => 'oke', 'msg' => 'Data berhasil di-update!'], 200);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'msg' => 'Failed to update: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Helper method untuk cek apakah ada data nutrition
     */
    private function hasNutritionData(Request $request)
    {
        return $request->filled(['calories']) || 
               $request->filled(['protein']) || 
               $request->filled(['fat']) || 
               $request->filled(['carbohydrates']) || 
               $request->filled(['fiber']);
    }
}