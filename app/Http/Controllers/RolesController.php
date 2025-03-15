<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::query()->orderByDesc('id')->get();
        return view('dashboard.roles.index')->with(['roles'=>$roles]);
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(Request $request){
        try{
            $validated =   $request->validate([
                'name'=> ['required','string', 'min:3', 'unique:roles,name'],
                'description'=> ['nullable', 'string']
            ]);
            
            $role = new Role();
            $role->name = $validated['name'];
            $role->description = $validated['description'];
            $role->save();
    
    
            return redirect()->route('roles')->with('success', 'Role created successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error', value: $e->getMessage());
        }

    }

    public function edit(Role $role){
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role){
        
    }


    public function destroy(Role $role){
        try{
            $role->delete();

            return redirect()->back()->with('success', 'Role Deleted successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error', value: $e->getMessage());
        }
    }
}