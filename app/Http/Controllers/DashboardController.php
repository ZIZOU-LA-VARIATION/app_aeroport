<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Builder\Function_;

class DashboardController extends Controller
{
    public Function index(){
        return view('dashboard.home');
    }
}
