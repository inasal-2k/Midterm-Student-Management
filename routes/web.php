<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');
Route::resource('students', StudentController::class)->only([
    'index',
    'create',
    'store',
    'edit',
    'update',
    'destroy',
]);
