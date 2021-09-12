<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Frontend\SiteController;

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



Route::group(['prefix'=>'admin','middleware'=>['admin:admin']], function(){
   Route::get('/login',[AdminController::class,'loginForm']);
   Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//FRONT END ALL ROUTES
Route::get('/',[UserController::class,'User']);
Route::get('/user/logout',[UserController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[UserController::class,'UserProfile'])->name('user.profile');
Route::get('/user/profilestore',[UserController::class,'UserProfileStore'])->name('user.profilestore');
Route::get('/user/changepassword',[UserController::class,'UserChangePassword'])->name('change.password');
Route::get('/user/changepasswordupdate',[UserController::class,'UserChangePasswordUpdate'])->name('user.changepassword.store');



//ADMIN ALL ROUTES
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/default/adminprofile',[AdminController::class,'adminprofileview'])->name('admin.adminprofileview');
Route::get('/admin/default/adminprofileedit',[AdminController::class,'adminprofileedit'])->name('admin.editprofile');
Route::post('/admin/default/adminprofilestore',[AdminController::class,'adminprofilestore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminController::class,'adminchangepassword'])->name('admin.change.password');
Route::post('/admin/password/update',[AdminController::class,'adminpasswordupdate'])->name('admin.password.update');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');