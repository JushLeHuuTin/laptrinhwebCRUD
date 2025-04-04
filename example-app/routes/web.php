<?php

use App\Http\Controllers\CrudUserController;
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

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome'); // Hiển thị trang chủ từ EXE1
});

// Route::get('dashboard', [CrudUserController::class, 'dashboard']);

// Route::get('login', [CrudUserController::class, 'login'])->name('login');
// Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

// Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

// Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

// Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
// Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

// Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

// Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

// Route::get('/', function () {
//     return view('welcome'); // Hiển thị trang chủ từ EXE1
// });
// // Route cho URL gốc
// Route::get('/', function () {
//     return view('exe.exe1.index');
// });

// // EXE1: Các trang HTML tĩnh
// Route::get('/exe/exe1/login', function () {
//     return view('exe.exe1.login');
// });

Route::get('/exe/exe1/login', [CrudUserController::class, 'login'])->name('login');
Route::post('/exe/exe1/login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('/exe/exe1/register', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('/exe/exe1/register', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('/exe/exe1/list', [CrudUserController::class, 'listUser'])->name('user.list');

// Route::get('/exe/exe1/register', function () {
//     return view('exe.exe1.register');
// });

// Route::get('/exe/exe1/list', function () {
//     return view('exe.exe1.list');
// });

// Route::get('/exe/exe1/view', function () {
//     return view('exe.exe1.view');
// });

Route::get('/exe/exe1/index', function () {
    return view('exe.exe1.index');
});

// Route::get('/exe/exe1/update', function () {
//     return view('exe.exe1.update');
// });

// // EXE2: Truy vấn dữ liệu
// Route::get('/exe/exe2/list', [App\Http\Controllers\CrudUserController::class, 'index']);
// Route::get('/exe/exe2/orders', [App\Http\Controllers\OrderController::class, 'index']);