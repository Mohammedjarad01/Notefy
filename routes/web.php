<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Students\MainCotroller;
use App\Http\Controllers\WelcomeController;
use App\Mail\BasicEmail;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', [WelcomeController::class , 'index']);
// // Route::get('/welcome', [WelcomeController::class , 'welcome']);

// route::get('/about' , function(){

//     return 'Mohammed Jarad';
// });
// route::get('/contact' , function(){

//     return 'hello 0597174645';

// });
// include __DIR__  . '/teacher.php';

// Rout e::get('/' , [AppController::class , 'index'])->name('home');
// Route::get('/Abut' , [AppController::class , 'about'])->name('about');
// Route::get('/contact' , [AppController::class , 'contact'])->name('contact');
// Route::get('/newws/{id}' , [AppController::class , 'news'])->name('News');
Route::controller(AppController::class)->group(function () {

    // Route::get('/' ,  'welcome')->name('home');
    Route::get('/abut', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/newws/{id}', 'news')->name('News');
});
Route::get('/', [WelcomeController::class, 'welcome'])->name('home');
Route::get('/calc/{x}/{y}', [AppController::class, 'calc']);

Route::resource("/note", NoteController::class);
Route::get('/mail', function () {

    Mail::to("mohammedjarad970@gmail.com")->send(new BasicEmail("Eng-jarad"));
    return view('massage');
});
Route::get('/contactus', [ContactusController::class, 'index'])->name('contact');
Route::post('/contactus/send', [ContactusController::class, 'store'])->name('contact.send');

Route::get("photo", [FileController::class, "index"])->name("photo");
Route::post("photo/upload", [FileController::class, "upload"])->name("photo.upload");
// Route::get('/note', [NotesController::class, 'index'])->name('notes.index');


// Route::get('notes' , function () {
//     return Note::all();
// });


//Register And Login Pages

// Route::get("register", [RegisterController::class, "create"])->name("register");
// Route::post("register/store", [RegisterController::class, "store"])->name("register.store");
// Route::get("home/{user}", [RegisterController::class, "show"])->name("home");

// Route::get("login", [LoginController::class, "create"])->name("login");
// Route::post("login/store", [LoginController::class, "store"])->name("login.store");
// Route::group(["middleware" => "auth"], function () {

// Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");
// Route::get("logout", [DashboardController::class, "logout"])->name("dashboard.logout");
// });

// Route::get("profile", [DashboardController::class,"profile"])->name("profile");
// Route::post("profile/update", [DashboardController::class,"profileUpdate"])->name("profile.update");
