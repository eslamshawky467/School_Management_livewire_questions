<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(['middleware' => 'auth:teacher,web'], function () {
    Route::get('/Get_classrooms/{id}', 'AjaxController@getClassrooms');
    Route::get('/Get_Sections/{id}', 'AjaxController@Get_Sections');
});

