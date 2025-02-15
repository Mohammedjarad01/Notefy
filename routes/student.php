
<?php
use App\Http\Controllers\Students\MainCotroller;
use Illuminate\Support\Facades\Route;


Route::prefix('students')->name('Names.')->group(function(){

Route::get('/' , [MainCotroller::class , 'index'])->name('index');



});