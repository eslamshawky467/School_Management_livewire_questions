<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        //eloquent
        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= Student::whereIn('section_id',$ids)->count();

//        $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
//        $count_sections =  $ids->count();
//        $count_students = DB::table('students')->whereIn('section_id',$ids)->count();  query builder

        return view('pages.Teachers.Dashboard',$data);
    });
    Route::group(['namespace' => 'Teachers'], function () {
        //==============================students============================
        Route::resource('student','ManagestudentController');
        Route::get('sections','ManagestudentController@sections')->name('sections');
        Route::post('attendance','ManagestudentController@attendance')->name('attendance');
        Route::get('report','ManagestudentController@attendancereport')->name('report');
        Route::post('report_search','ManagestudentController@attendanceSearch')->name('attendance.search');
        Route::resource('quizzes', 'QuizzController');

        Route::resource('student','ManagestudentController');
        Route::resource('questions', 'QuestionController');
        Route::get('profile','ProfileController@index')->name('profile.show');
        Route::post('profile/{id}','ProfileController@update')->name('profile.update');
    });

});
