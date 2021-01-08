<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WistonController;


Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localizationRedirect', 'localeViewPath' ]
	],
	function()
	{

		Route::get('/', [PageController::class, 'index'])->name('home');
		Route::get('/contact', [PageController::class, 'contact'])->name('contact');
		Route::post('/contact', [PageController::class, 'contactForm'])->name('contact-form');

		Route::get('/page/{alias}', [PageController::class, 'show'])->name('page.show');

		Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

		Route::get('/news', [NewsController::class, 'index'])->name('news');
		Route::get('/news/show/{id}', [NewsController::class, 'show'])->name('news-show');

		Route::get('/wiston', [WistonController::class, 'index'])->name('wiston');
		Route::get('/wiston/floors/{id}', [WistonController::class, 'floors'])->name('wiston.floors');
		Route::get('/wiston/floors/{id}/{floor}', [WistonController::class, 'floor'])->name('wiston.floor');

		Route::get('/apartment/{id}', [WistonController::class, 'show'])->name('wiston.show');
		Route::post('/application', [WistonController::class, 'application'])->name('application');
	});


//login
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('post-login');
