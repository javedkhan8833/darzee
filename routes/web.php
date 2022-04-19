<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\user_managment\RoleController;
use App\Http\Controllers\user_managment\PermissionController;
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

Route::get('/', function () {
    // return view('home');
    return view('pages.login');
});
Route::post('/checkuser',[HomeController::class,'checkuser'])->name('checkuser');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/showsignup',[HomeController::class,'show'])->name('signup');
Route::post('/register',[HomeController::class,'store'])->name('register');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');


Route::group(['middleware' => ['role:admin']], function () {

        Route::get('/roleslist',[RoleController::class,'index'])->name('roles-list');
        Route::get('/createrole',[RoleController::class,'create'])->name('role-form');
        Route::post('/addrole',[RoleController::class,'saveRole'])->name('add-role');

        // permission controller
        Route::get('/addpermission',[PermissionController::class,'addPermission'])->name('add-permission');
        Route::get('/permissionlist',[PermissionController::class,'index'])->name('permission_list');
        Route::post('/storepermission',[PermissionController::class,'store'])->name('store-permission');


});
// Route::group(['middleware' => ['role:manager']], function () {


// });
// Route::group(['middleware' => ['role:client']], function () {


// });

// Route::get('/register')''



// Auth::routes();
