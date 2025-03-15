<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// page de listing des rôles
Route::get('/role', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');

// creation de la page d'affichage des rôles
Route::get('/role/create', [App\Http\Controllers\RolesController::class, 'create'])->name('role_create');

// creation de la page d'affichage des rôles
Route::post('/role', [App\Http\Controllers\RolesController::class, 'store'])->name('role_store');


// creation de la page d'affichage des rôles
Route::delete('/role/{role}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role_destroy');


// creation de la page d'affichage des rôles
Route::get('/role/edit/{role}', [App\Http\Controllers\RolesController::class, 'edit'])->name('role_edit');


// creation de la page d'affichage des rôles
Route::put('/role/{role}', [App\Http\Controllers\RolesController::class, 'update'])->name('role_update');
