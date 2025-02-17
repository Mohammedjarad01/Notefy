<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use App\Mail\BasicEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// Route for home page
Route::get('/', [WelcomeController::class, 'welcome'])->name('home');

// Note routes
Route::resource("/note", NoteController::class);

// Route to search notes by tag
Route::get('/search', [NoteController::class, 'searchByTag'])->name('note.searchByTag');

// Mail route for testing
Route::get('/mail', function () {
    Mail::to("mohammedjarad970@gmail.com")->send(new BasicEmail("Eng-jarad"));
    return view('massage');
});

// Contact Us routes
Route::get('/contactus', [ContactusController::class, 'index'])->name('contact');
Route::post('/contactus/send', [ContactusController::class, 'store'])->name('contact.send');

// File upload routes
Route::get("photo", [FileController::class, "index"])->name("photo");
Route::post("photo/upload", [FileController::class, "upload"])->name("photo.upload");
