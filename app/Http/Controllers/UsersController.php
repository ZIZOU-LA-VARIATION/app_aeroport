<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::with('role')->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::query()->get();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $validator =   Validator::make($request->all(), [
                'name'=> ['required','string', 'min:3'],
                'email'=> ['required', 'string'],
                'phone'=> ['nullable', 'string'],
                'role_id'=> ['required'],
            ]);


            $validated = $validator->validated();
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];

            $role =  Role::query()->where('id', $validated['role_id'])->first();
            if(!$role){
                throw new Exception('Role not found', 404);
            }

            $user->role_id=$role->id;
            $user->save();
    
    
            return redirect()->route('user.index')->with('success', 'User created successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error', value: $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
