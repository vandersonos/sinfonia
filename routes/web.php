<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\MediasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('users/{id}/remove', [UsersController::class, 'previewRemove']);
Route::resource('users', UsersController::class)->missing(function (Request $request) {
    return Redirect::route('users.index');
});
Route::get('medias/{id}/remove', [MediasController::class, 'previewRemove']);
Route::resource('medias', MediasController::class)->missing(function (Request $request) {
    return Redirect::route('medias.index');
});

