<?php

use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use Illuminate\Routing\Router;
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


Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('signout', [CrudUserController::class, 'signout'])->name('signout');
Route::get('index', [CrudUserController::class, 'index'])->name('index');
Route::get('register', [CrudUserController::class, 'register'])->name('register');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');
// Route::get('list', [CrudUserController::class, 'listUser'])->name('list');
Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');
Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');
Route::post('postUpdateUser', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

// Route::get('viewRole', [CrudUserController::class, 'listUser'])->name('user.list');

//Roles
Route::get('role', [RoleController::class, 'role'])->name('user.role');

Route::get('/',function(){
return view("welcome");
});
//order
Route::get('order', [OrderController::class, 'view'])->name('user.order');
Route::get('order/find', [CrudUserController::class, 'find'])->name('user.find');

