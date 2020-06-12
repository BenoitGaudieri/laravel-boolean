<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Static pages
Route::get('/', "StaticPageController@index")->name("static-page.home");
Route::get('/privacy', "StaticPageController@privacy")->name("static-page.privacy");
Route::get('/faq', "StaticPageController@faq")->name("static-page.faq");


// Students
Route::get('/students', "StudentController@index")->name("student.index");
// Student page by id
// Route::get('/students/show/{id}', "StudentController@show")->name("student.show");

// with slug
Route::get('/students/show/{slug}', "StudentController@show")->name("student.show");
