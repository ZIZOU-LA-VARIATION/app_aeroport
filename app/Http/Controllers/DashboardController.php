<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Builder\Function_;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public Function index(){
        $users = 0 ;
        $roles = 0 ;
        $users = User::query()->count();
        $roles = Role::query()->count();
        return view('dashboard.home', compact('users','roles'));
    }

}

