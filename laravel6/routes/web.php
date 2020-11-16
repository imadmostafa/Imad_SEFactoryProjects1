<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Likes;
use GuzzleHttp\Middleware;

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
    return view('welcome');
});
Auth::routes();



Route::get('/first',[LikesController::class, 'index'])->middleware('auth');//tessting ffunctions


Route::get('/like_article/{article_id}',[LikesController::class,'update_like']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/myArticles',[ArticleController::class,'selfindex'])->middleware('auth');
Route::get('/addArticle',[ArticleController::class,'show_insertForm'])->middleware('auth');
Route::post('/addArticle',[ArticleController::class,'create'])->middleware('auth');
Route::post('/deleteArticle/{article_id}', [ArticleController::class,'delete'])->middleware('auth');//delete current pressed article
Route::post('/add_comment/{article_id}',[CommentsController::class,'add_comment'])->middleware('auth');



