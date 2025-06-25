<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return redirect()->route('employee_admin')->with('status','Success updated data!');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
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
    
        return view("admin.employee", ["employee" => $employee]);
    }
    
}
