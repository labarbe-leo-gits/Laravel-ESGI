<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/projects', function() {
    $model = new Project();
    $projects = $model->getAll();

    return view('projects.index', compact('projects'));
})->name('projects');

Route::get('/project/{id}', function ($id) {
    $model = new Project();
    $project = $model->retrieve($id);

    return view('projects.show', compact('project'));
})->name('projects.id');
