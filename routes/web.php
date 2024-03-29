<?php

use App\Events\ChatMessage;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// admin
Route::get('/admins-only', function () {
    return 'only admins can see this page';
})->middleware('can:visitAdminPages');

// User related routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('mustBeLoggedIn');
Route::get('/manage-avatar', [UserController::class, "ManageAvatarForm"]);
Route::post('/manage-avatar', [UserController::class, "storeAvatar"]);

// Blog post related routes
Route::get('/create-post', [PostController::class, "showCreateForm"])->middleware('mustBeLoggedIn');
Route::post('/create-post', [PostController::class, "storeNewPost"])->middleware('mustBeLoggedIn');
Route::get('/post/{post}', [PostController::class, "viewSinglePost"])->middleware('mustBeLoggedIn');
Route::delete('/post/{post}', [PostController::class, "delete"])->middleware('can:delete,post', 'mustBeLoggedIn');
Route::get('/post/{post}/edit', [PostController::class, "showEditForm"])->middleware('can:update,post', 'mustBeLoggedIn');
Route::put('/post/{post}', [PostController::class, "actuallyUpdate"])->middleware('can:update,post', 'mustBeLoggedIn');
Route::get('search/{term}', [PostController::class, "search"]);

// Follow related routes
Route::post('/create-follow/{user:username}', [FollowController::class, "createFollow"])->middleware('mustBeLoggedIn');
Route::post('/remove-follow/{user:username}', [FollowController::class, "removeFollow"])->middleware('mustBeLoggedIn');

// Profile related routes
Route::get('/profile/{user:username}', [UserController::class, "profile"])->middleware('mustBeLoggedIn');
// Route::get('/profile/{user:username}/followers', [UserController::class, "profileFollowers"]);
// Route::get('/profile/{user:username}/following', [UserController::class, "profileFollowing"]);

// Chat route
// Route::post('/send-chat-message', function (Request $request) {
//     $formFields = $request->validate([
//         'textvalue' => 'required'
//     ]);

//     if (!trim(strip_tags($formFields['textvalue']))) {
//         return response()->noContent();
//     }
//     broadcast(new ChatMessage(['username' => auth()->user()->username, 'textvalue' => strip_tags($request->textvalue), 'avatar' => auth()->user()->avatar]))->toOthers();
//     return response()->noContent();
// })->middleware('mustBeLoggedIn');
