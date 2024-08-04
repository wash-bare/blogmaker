<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    // return view('welcome');
    return redirect('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
//     return view('home');
// });

/** TOP画面 */
Route::get('/top', function () {
    return view('top');
});
Auth::routes();

/** マイページ */
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\MypageController::class,
  'index'])->name('mypage');

/** ブログ草稿 */
Route::get('/article', [App\Http\Controllers\ArticleController::class,
  'index'])->name('article.index');
Route::get('/article/addnew', [App\Http\Controllers\ArticleController::class,
  'addnew'])->name('article.addnew');
Route::post('/article/addnew', [App\Http\Controllers\ArticleController::class,
  'regist_addnew'])->name('article.regist_addnew');
Route::get('/article/edit', [App\Http\Controllers\ArticleController::class,
  'edit'])->name('article.edit');
Route::post('/article/edit', [App\Http\Controllers\ArticleController::class,
  'regist_edit'])->name('article.regist_edit');
Route::get('/article/copy', [App\Http\Controllers\ArticleController::class,
  'copy'])->name('article.copy');

/** 用語集 */
Route::get('/word', [App\Http\Controllers\WordListController::class, 'index'])->name('word');

/** 問題集 */
Route::get('/qa', [App\Http\Controllers\QaListController::class, 'index'])->name('qa');
