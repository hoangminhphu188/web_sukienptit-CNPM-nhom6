<?php

namespace App;

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdminNotLogin;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\user\UserEventController;

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
// ham tra ve trang chu chinh
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('events', [UserController::class, 'events'])->name('user.events.index'); // yeu cau den trang cac su kien 
Route::get('events/search', [UserController::class, 'eventsSearch'])->name('user.events.search');// yeu cau tim su kien

Route::get('about', [UserController::class, 'about'])->name('user.about.index');

Route::middleware([CheckAdminNotLogin::class])->group(function () { // ham kiem tra admin chua dang nhap
    Route::get('/admin', [AuthController::class, 'index']);
    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');//yeu cau den trang login
    Route::post('/admin/login/process', [AuthController::class, 'login'])->name('admin.auth.login');//yeu cau dang nhap
});

Route::middleware([CheckAdmin::class])->group(function () { // ham kiem tra admin da dang nhap
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');//yeu cau logout

    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');//yeu cau xem thong tin chi tiet su kien
    Route::post('/admin/events/status', [EventController::class, 'status'])->name('admin.events.status');// yeu cau doi trang thai cua su kien
    Route::get('admin/events/search', [EventController::class, 'search'])->name('admin.events.search');// yeu cau tim kiem su kien

    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');//yeu cau tao moi su kien
    Route::post('/admin/events/create/process', [EventController::class, 'store'])->name('admin.events.create.process'); // tao moi su kien va luu 

    Route::post('/admin/events/delete', [EventController::class, 'delete'])->name('admin.events.delete');//yeu cau xoa su kien

    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');// yeu cau chinh sua su kien 
    Route::post('/admin/events/{id}/edit/process', [EventController::class, 'update'])->name('admin.events.edit.process');// chinh sua su kien va update
});
