<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TasksController;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/test-flux', function () {
    return view('test-flux');
})->name('test-flux');

// Route::get('/projects', function() {
//     $projects = Project::all();
//     return view('projects.index', compact('projects'));
// })->name('projects.index');

Route::resource('projects', ProjectController::class);
Route::resource('tasks', TasksController::class);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
