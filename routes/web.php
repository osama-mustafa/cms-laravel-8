<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SiteUIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Setting;
use Illuminate\Cache\TagSet;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\TestEmail;


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

// Auth::routes(['verify' => true]);
Auth::routes();




Route::middleware('auth')->group(function()  {

    // Route For Dashboard

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // Routes For Posts

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.delete');

    // Routes For Categories

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    
    // Routes For Tags

    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('tag.delete');

    // Routes For Edit Profiles

    Route::get('/user/profile', [ProfilesController::class, 'index'])->name('users.profile');
    Route::get('user/profile/create', [ProfilesController::class, 'create'])->name('users.profile.create');
    Route::post('/user/profile/update', [ProfilesController::class, 'update'])->name('users.profile.update');

});


Route::middleware(['auth', 'admin'])->group(function() {

    // Routes For Assign Admin & Remove Admin

    Route::get('/users/admin/{id}', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/users/notAdmin/{id}', [UserController::class, 'notAdmin'])->name('users.not.admin');

    // Routes For Website Settings

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
    
    // Routes For Users

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');

    // Soft Deletes & Restore For Posts

    Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/post/restore/{id}', [PostController::class, 'restoreItem'])->name('post.restore');
    Route::delete('/post/hard-delete/{id}', [PostController::class, 'hardDelete'])->name('post.hard.delete');
    

});



// Route For Homepage
Route::get('/', [SiteUIController::class, 'index'])->name('home');

// Route For About-Us Page
Route::get('/about', [SiteUIController::class, 'about'])->name('about');

// Routes For Contact-Us Page
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'storeContact'])->name('contact.store');

//Route For Showing Single Post
Route::get('/post/{slug}', [SiteUIController::class, 'showPost'])->name('post.show');

// Route For Showing Posts of Each Category
Route::get('/category/{id}', [SiteUIController::class, 'category'])->name('category.show');

// Route For Showing Posts of Each Tag
Route::get('/tag/{id}', [SiteUIController::class, 'tag'])->name('tag.show');

// Route For Search Feature in The Homepage
Route::get('/results', [SiteUIController::class, 'searchEngine'])->name('search.results');


