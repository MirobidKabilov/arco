<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\ApartmentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BlockController;
use App\Http\Controllers\Backend\FloorController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Auth\LoginController;

// syspanel
Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard');

// PageController
Route::get('/page', [PageController::class, 'index'])->name('backend.page.index');
Route::get('/page/data', [PageController::class, 'data'])->name('backend.page.data');
Route::get('/page/form/{id?}', [PageController::class, 'getForm'])->name('backend.page.getform');
Route::post('/page/form/{id?}', [PageController::class, 'postForm'])->name('backend.page.postform');
Route::post('/page/delete', [PageController::class, 'delete'])->name('backend.page.delete');

// Filemanager
Route::get('/filemanager', [PageController::class, 'filemanager'])->name('backend.fm.index');

//password change
Route::get('pasword', [PasswordController::class, 'index'])->name('backend.password.index');
Route::post('password', [PasswordController::class, 'form'])->name('backend.password.form');


// objects
Route::get('objects', [BlockController::class, 'index'])->name('backend.blocks.show');
Route::get('objects/{block_id}', [FloorController::class, 'index'])->name('backend.floors.show')
                ->where(['block_id' => '[0-9]+']);
Route::get('objects/{block_id}-{floor_id}', [ApartmentController::class, 'index'])->name('backend.apartments.show')
                ->where(['block_id' => '[0-9]+', 'floor_id' => '[0-9]+']);

// blocks
Route::get('blocks/data', [BlockController::class, 'data'])->name('backend.blocks.data');
Route::post('blocks/form', [BlockController::class, 'form'])->name('backend.blocks.form');
Route::post('blocks/delete', [BlockController::class, 'delete'])->name('backend.blocks.delete');

// floors
Route::get('floors/data', [FloorController::class, 'data'])->name('backend.floors.data');
Route::post('floors/form', [FloorController::class, 'form'])->name('backend.floors.form');
Route::post('floors/delete', [FloorController::class, 'delete'])->name('backend.floors.delete');

//apartments
Route::get('apartments/data', [ApartmentController::class, 'data'])->name('backend.apartments.data');
Route::post('apartments/form', [ApartmentController::class, 'form'])->name('backend.apartments.form');
Route::post('apartments/delete', [ApartmentController::class, 'delete'])->name('backend.apartments.delete');

// applications
Route::get('applications', [ApplicationController::class, 'index'])->name('backend.applications.show');
Route::get('applications/data', [ApplicationController::class, 'data'])->name('backend.applications.data');
Route::post('applications/delete', [ApplicationController::class, 'delete'])->name('backend.applications.delete');
Route::post('applications/read', [ApplicationController::class, 'read'])->name('backend.applications.read');

//sliders
Route::get('sliders', [SliderController::class, 'index'])->name('backend.sliders.show');
Route::get('sliders/data', [SliderController::class, 'data'])->name('backend.sliders.data');
Route::post('sliders/form', [SliderController::class, 'form'])->name('backend.sliders.form');
Route::post('sliders/delete', [SliderController::class, 'delete'])->name('backend.sliders.delete');

//news
Route::get('news', [NewsController::class, 'index'])->name('backend.news.show');
Route::get('news/data', [NewsController::class, 'data'])->name('backend.news.data');
Route::get('news/form/{id?}', [NewsController::class, 'getform'])->name('backend.news.getform');
Route::post('news/form/{id?}', [NewsController::class, 'postform'])->name('backend.news.postform');
Route::post('news/delete', [NewsController::class, 'delete'])->name('backend.news.delete');

//partners
Route::get('partners', [PartnerController::class, 'index'])->name('backend.partners.show');
Route::get('partners/data', [PartnerController::class, 'data'])->name('backend.partners.data');
Route::post('partners/form', [PartnerController::class, 'form'])->name('backend.partners.form');
Route::post('partners/delete', [PartnerController::class, 'delete'])->name('backend.partners.delete');

//Gallery
Route::get('gallery', [GalleryController::class, 'index'])->name('backend.gallery.index');
Route::get('gallery/data', [GalleryController::class, 'data'])->name('backend.gallery.data');
Route::post('gallery/form', [GalleryController::class, 'form'])->name('backend.gallery.form');
Route::post('gallery/delete', [GalleryController::class, 'delete'])->name('backend.gallery.delete');

//logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
