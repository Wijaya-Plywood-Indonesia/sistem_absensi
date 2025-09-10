<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});
