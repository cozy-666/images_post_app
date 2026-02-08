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
//無名関数
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello, World!";
});

// //コントローラー作成せずにルート設定
// Route::get('/user/{id}', User::class . '@getUserById');

Route::get('/posts',
[PostController::class,'index'])
->name('posts.index');

Route::get('/post/create',
[PostController::class,'create']);

// Route::get('/posts/redirect',
// [PostController::class,'indexRedirect']);

// Route::get('/posts2',
// [PostController::class,'index2']);

// Route::get('/posts3',
// [PostController::class,'indexNormalSql']);

// Route::middleware('auth')->group(function(){
//     Route::post('/posts',
//     [PostController::class,'store']);
// });

// Route::prefix('posts')->group(function(){
//     Route::get('/create',[PostController::class, 'create']);
//     Route::get('/edit',[PostController::class, 'edit']);
//     Route::get('/show',[PostController::class, 'show']);
//     Route::get('/delete',[PostController::class, 'delete']);
// });

// Route::post('/posts/create/bulk',
// [PostController::class,'createBulkPostWithNormalSql']);

// Route::post('/posts/create/normal',
// [PostController::class,'createPostWithNormalSql']);

// Route::post('/posts/update/normal',
// [PostController::class,'updatePostWithNormalSql']);

// Route::post('/posts/delete/normal',
// [PostController::class,'deletePostWithNormalSql']);

// Route::get('/posts/show/qerybuilder',
// [PostController::class,'getPostWithQueryBuilder']);

// Route::post('/posts/create/qerybuilder',
// [PostController::class,'createPostWithQueryBuilder']);

// Route::post('/posts/update/qerybuilder',
// [PostController::class,'updatePostWithQueryBuilder']);

// Route::post('/posts/delete/qerybilder',
// [PostController::class,'deletePostWithQueryBuilder']);

// Route::get('/posts/show/qerybuilder/filter',
// [PostController::class,'getPostWithQueryBuilderByFilter']);

// Route::get('/posts/show/qerybuilder/count',
// [PostController::class,'getCountPost']);

// Route::get('/posts/show/qerybuilder/join',
// [PostController::class,'getPostWithQueryBuilderByFilter']);

// Route::get('/posts/show/qerybuilder/sbquery',
// [PostController::class,'getPostWithQueryBuilderBySubQuery']);

// Route::get('/posts/show/eloquent',
// [PostController::class,'getPostWithEloquent']);

// Route::get('/posts/show/eloquent/{post}',
// [PostController::class,'getPostWithEloquentById']);

// Route::get('/posts/show/eloquent/trashed',
// [PostController::class,'getPostWithEloquentTrashed']);

// Route::post('/posts/create/eloquent',
// [PostController::class,'createPostWithEloquent']);

// Route::post('/posts/update/eloquent',
// [PostController::class,'updatePostWithEloquent']);

// Route::post('/posts/delete/eloquent/{id}',
// [PostController::class,'deletePostWithEloquent']);
