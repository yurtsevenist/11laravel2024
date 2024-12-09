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

Route::prefix('blog-yazilari')->group(function(){
    Route::get('blog', [Controller::class, 'blog'])->name('blog');
    Route::get('blog-detay/{slug}/{id}', [Controller::class, 'blogdetay'])->name('blog-detay');
    Route::get('yazar-detay/{slug}', [Controller::class, 'yazardetay'])->name('yazar-detay');
    Route::get('likeBlog',[Controller::class,'likeBlog'])->name('likeBlog');
});