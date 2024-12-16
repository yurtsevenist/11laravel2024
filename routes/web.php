<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'main'])->name('/');
Route::get('hakkimda', [Controller::class, 'about'])->name('hakkimda');
Route::get('iletisim', [Controller::class, 'contact'])->name('iletisim');
Route::get('login', [Controller::class, 'login'])->name('login');
Route::get('register', [Controller::class, 'register'])->name('register');
Route::post('registerPost', [Controller::class, 'registerPost'])->name('registerPost');
Route::post('loginPost', [Controller::class, 'loginPost'])->name('loginPost');
Route::get('logout', [Controller::class, 'logout'])->name('logout');
Route::get('401', [Controller::class, 'yetkisiz'])->name('401');


Route::prefix('blog-yazilari')->group(function(){
    Route::get('blog', [Controller::class, 'blog'])->name('blog');
    Route::get('blog-detay/{slug}/{id}', [Controller::class, 'blogdetay'])->name('blog-detay');
    Route::get('yazar-detay/{slug}', [Controller::class, 'yazardetay'])->name('yazar-detay');
    Route::get('likeBlog',[Controller::class,'likeBlog'])->name('likeBlog');
});

//login olan ama yetkisi yönetici olanlar için
Route::group(['middleware' => ['auth', 'verified','isAdmin']], function () {
    Route::get('panel', [Controller::class, 'dashboard'])->name('panel');
});

//login olan ama yetkisi kullanıcı olanlar için
Route::group(['middleware' => ['auth', 'verified','isUser']], function () {
   
});