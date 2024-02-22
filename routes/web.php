<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Faker\Guesser\Name;

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

Route::get('/',[PublicController::class, 'home'])->name('welcome');
Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('category_show');


Route::get('/nuovo/annuncio',[AnnouncementController::class, 'create'])->name('announcement_create');
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement_show');
Route::get('/tutti/annunci',[AnnouncementController::class, 'indexAnnouncement'])->name('announcement_index');

// Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor_index');
//Accetta Annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor_accept_announcement');
//Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor_reject_announcement');

//Richiedi di diventare revisore
Route::post('/richietsa/revisore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become_revisor');
//Rendi utente revisore
Route::get('/rendi/revisore/{user}',[RevisorController::class, 'makeRevisor'])->name('make_revisor');

//Vista lavora con noi
Route::get('/lavoraconnoi',[RevisorController::class, 'lavoraIndex'])->name('lavora_con_noi');
//vista ricerca annuncio
Route::get('/ricercaannuncio', [PublicController::class, 'searchAnnouncements'])->name('search_announcements');

// Cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLocale'])->name('setLocale');

