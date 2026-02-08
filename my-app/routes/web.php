<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

//コントローラー作成せずにルート設定
Route::get('/user/{id}', User::class . '@getUserById');

Route::get('/posts',
[PostController::class,'index'])
->name('posts.index_route');

Route::get('/posts/redirect',
[PostController::class,'indexRedirect']);

Route::get('/posts2',
[PostController::class,'index2']);

Route::get('/posts3',
[PostController::class,'indexNormalSql']);

Route::middleware('auth')->group(function(){
    Route::post('/posts',
    [PostController::class,'store']);
});

Route::post('/posts/create/bulk',
[PostController::class,'ccreateBulkPostWithNormalSql']);

Route::post('/posts/create/normal',
[PostController::class,'createPostWithNormalSql']);

Route::post('/posts/update/normal',
[PostController::class,'updatePostWithNormalSql']);

Route::post('/posts/delete/normal',
[PostController::class,'deletePostWithNormalSql']);

Route::get('/posts/show/qerybuilder',
[PostController::class,'getPostWithQueryBuilder']);

Route::post('/posts/create/qerybuilder',
[PostController::class,'createPostWithQueryBuilder']);

Route::post('/posts/update/qerybuilder',
[PostController::class,'updatePostWithQueryBuilder']);

Route::post('/posts/delete/qerybilder',
[PostController::class,'deletePostWithQueryBuilder']);

Route::get('/posts/show/qerybuilder/filter',
[PostController::class,'getPostWithQueryBuilderByFilter']);

Route::get('/posts/show/qerybuilder/count',
[PostController::class,'getCountPost']);

Route::get('/posts/show/qerybuilder/join',
[PostController::class,'getPostWithQueryBuilderByFilter']);

Route::get('/posts/show/qerybuilder/sbquery',
[PostController::class,'getPostWithQueryBuilderBySubQuery']);

Route::get('/posts/show/eloquent',
[PostController::class,'getPostWithEloquent']);

Route::get('/posts/show/eloquent/{id}',
[PostController::class,'getPostWithEloquentById']);

Route::get('/posts/show/eloquent/trashed',
[PostController::class,'getPostWithEloquentTrashed']);

Route::post('/posts/create/eloquent',
[PostController::class,'createPostWithEloquent']);

Route::post('/posts/update/eloquent',
[PostController::class,'updatePostWithEloquent']);

Route::post('/posts/delete/eloquent/{id}',
[PostController::class,'deletePostWithEloquent']);
