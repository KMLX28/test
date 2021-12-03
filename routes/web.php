<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => view('welcome'))->name('welcome');

Route::post('subscription', [SubscriptionController::class, 'store'])->name('subscribe.store');
Route::resource('websites', WebsiteController::class)->only(['index', 'show']);
Route::resource('posts', PostController::class)->only(['create', 'store', 'show']);
