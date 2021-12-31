<?php

use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\EndUser\FaqController;
use App\Http\Controllers\EndUser\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/faqs',[FaqController::class,'index'])->name('faqs');
Route::post('/contact',[\App\Http\Controllers\EndUser\ContactController::class,'store'])->name('contact.store');


Route::group(['middleware' => 'guest'],function (){
    Route::get('admin/login',[AdminAuthController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('admin/login',[AdminAuthController::class, 'login'])->name('admin.login');
});


Route::group(['prefix' => 'admin' , 'as' => 'admin.' , 'middleware'=>'auth' ] , function (){
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    Route::post('logout',[AdminAuthController::class, 'logout'])->name('logout');


    // FAQ`s Routes
    Route::group(['prefix' => 'faq' , 'as' => 'faq.'] , function (){
        Route::get('/', [AdminFaqController::class, 'index'])->name('all');
        Route::get('/create', [AdminFaqController::class, 'create'])->name('create');
        Route::post('/store', [AdminFaqController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminFaqController::class, 'delete'])->name('delete');
        Route::get('/edit/{faqId}', [AdminFaqController::class, 'edit'])->name('edit');
        Route::put('/update', [AdminFaqController::class, 'update'])->name('update');
    });


    // Teacher`s Routes
    Route::group(['prefix' => 'teachers' , 'as' => 'teacher.'],function (){
        Route::get('/', [AdminTeacherController::class, 'index'])->name('all');
        Route::get('/create',[AdminTeacherController::class,'create'])->name('create');
        Route::post('/store', [AdminTeacherController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminTeacherController::class, 'delete'])->name('delete');
        Route::get('/edit/{teacherId}', [AdminTeacherController::class, 'edit'])->name('edit');
        Route::put('/update',[AdminTeacherController::class,'update'])->name('update');
    });


    // Activity`s Routes
    Route::group(['prefix' => 'activities' , 'as' => 'activity.'],function (){
        Route::get('/', [AdminActivityController::class, 'index'])->name('all');
        Route::get('/create',[AdminActivityController::class,'create'])->name('create');
        Route::post('/store', [AdminActivityController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminActivityController::class, 'delete'])->name('delete');
        Route::get('/edit/{activityId}', [AdminActivityController::class, 'edit'])->name('edit');
        Route::put('/update',[AdminActivityController::class,'update'])->name('update');
    });


    // Course`s Routes
    Route::group(['prefix' => 'courses' , 'as' => 'course.'],function (){
        Route::get('/', [AdminCourseController::class, 'index'])->name('all');
        Route::get('/create',[AdminCourseController::class,'create'])->name('create');
        Route::post('/store', [AdminCourseController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminCourseController::class, 'delete'])->name('delete');
        Route::get('/edit/{courseId}', [AdminCourseController::class, 'edit'])->name('edit');
        Route::put('/update',[AdminCourseController::class,'update'])->name('update');
    });


    // Slider Routes
    Route::group(['prefix' => 'slider' , 'as' => 'slider.'], function (){
        Route::get('/', [AdminSliderController::class, 'index'])->name('all');
        Route::get('/create', [AdminSliderController::class, 'create'])->name('create');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('store');
        Route::delete('/delete', [AdminSliderController::class, 'delete'])->name('delete');
        Route::get('/edit/{sliderId}', [AdminSliderController::class, 'edit'])->name('edit');
        Route::put('/update',[AdminSliderController::class,'update'])->name('update');
    });


    //  Contact Routes
    Route::group(['prefix' => 'contact' , 'as' => 'contact.'], function (){
        Route::get('/', [AdminContactController::class, 'index'])->name('all');
        Route::delete('/delete', [AdminContactController::class, 'delete'])->name('delete');
    });

});

