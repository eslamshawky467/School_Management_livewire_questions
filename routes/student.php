<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Student;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        $ids = Student::findorFail(auth()->user()->id)->section()->get();
        $id = Student::findorFail(auth()->user()->id)->pluck('classroom_id');
        $data['count_sections']= $ids->count();
        $data['count_subjects']= \App\Models\Subject::where('classroom_id',$id)->count();
        return view('pages.Students.dashboard',$data);
    });
    Route::group(['namespace' => 'Students'], function () {
        //==============================students============================
        Route::resource('student_exams','ExamController');

    });

});
