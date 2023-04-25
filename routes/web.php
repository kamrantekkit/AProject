<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('project/editor/new', function () {
    return view('editor');
})->middleware('auth')->name('project.editor.new');

Route::get('project/editor/new', function () {
    return view('editor');
})->middleware('auth')->name('project.editor.new');

Route::get('project/editor/{pid}', [\App\Http\Controllers\EditorController::class, 'getProject'])->middleware('auth')->name('project.editor.existing');

Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index'])->name('dashboard');

Route::get('project/list', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.list');

Route::get('project/list/{pid}', [App\Http\Controllers\ProjectController::class, 'getProject'])->name('project.list.pid');

Auth::routes();

Route::post('project/editor/new', [\App\Http\Controllers\EditorController::class, 'register'])->middleware('auth')->name("project.editor.new");

Route::post('project/editor/update/{pid}', [\App\Http\Controllers\EditorController::class, 'updateProject'])->middleware('auth')->name('project.editor.update');
