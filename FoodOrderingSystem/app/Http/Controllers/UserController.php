<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent
        $user = User::all();
        
        //method 1
        return view('customer.index',compact('user'));
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
         $data = new User();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->role = 'employee';

        $data->save();
        return redirect()->route('admin.employee_admin')->with('status','Success updated data!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
         DB::beginTransaction();

        try {
            $id = $request->id;
            $employee = User::find($id);

            if (!$employee || $employee->role !== 'employee') {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Employee not found or unauthorized'
                ], 404);
            }
            $employee->delete();

            DB::commit();
            return redirect()->route('admin.employee_admin')->with('status','Success created data!');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'msg' => 'Failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function DetailCustomer()
    {
        // Ambil data customer dan paginate
        $cust = User::where('role', 'customer')->paginate(10);
    
        return view("admin.customer", ["customer" => $cust]);
    }
    public function DetailEmployee()
    {
        // Ambil data customer dan paginate
        $employee = User::where('role', 'employee')->paginate(10);
    
        return view("admin.employee.employee", ["employee" => $employee]);
    }
    
    public function getEditForm(Request $request)
{
    $data = User::find($request->id);
    if (!$data) {
        return response()->json(['status' => 'error', 'msg' => 'Data not found.']);
    }

    return response()->json([
        'status' => 'ok',
        'msg' => view('admin.employee.editForm', compact('data'))->render()
    ]);
}

public function saveDataUpdate(Request $request)
{
    $data = User::find($request->id);
    if (!$data) {
        return response()->json(['status' => 'error', 'msg' => 'Data not found.']);
    }

    $data->name = $request->name;
    $data->email = $request->email;
    $data->no_telp = $request->no_telp;
    if ($request->password) {
        $data->password = bcrypt($request->password);
    }
    $data->save();

    return response()->json(['status' => 'oke', 'msg' => 'Berhasil update employee!']);
}

}
