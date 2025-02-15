<?php

use App\Http\Controllers\Teachers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/teacher' , function(){

//  return 'hello tacher';

// });

// Route::get('/copright' , function(){

//     return 'All copyright reserved by mohammed';
// });

// // Route::fallback(function(){
// //     return 'error';
// // });

// Route::match([ 'put' , 'patch'] , '/hello' , function(){
//     return 'ahmed';
// });

// Route::view('/welcome' , 'test');

// Route::get('/news/{id}' ,function( $id){
//     return "news No# $id";
// } );
// Route::get('/news/id/{id}/name/{name?}' , function($id , $name = ''){

//      return "news No# $id , name $name";
// })->name('news');

// Route::get('/generate' , function(){
//   $id = 20;
//   $name = 'war';
//   return route('news' , [$id , $name]);

// });
Route::get('/news/{id}' , function($id){

  return "'Hello mohammed jarad $id'";
})->whereNumber('id')->name('news');

Route::get('/news{id}' , function($id){
  // $id = 30;
  $name = 'hello mohammed jarad';
  return "Name $name $id'";
})->whereNumber('id')->name('news');
Route::get('/about' , function(){
  $name = 'ali';
  $id = 2025;
return route('news' , [$id , $name]);

});
Route::get('/info/{name}/{id?}' , function($name , $id = null){

   return "ITS $name Dob $id" ;
});

Route::prefix('admin')->name('Admin.')->middleware('auth')->group(function(){

  Route::get('/admin' , function(){

    return "Admin Dashboard";
  })->name('dashboard');
  Route::get('/tags' , function(){
  
    return "Tags Dashboard";
  })->name('tags');
  Route::get('/posts' , function(){
  
    return "Posts Dashboard";
  })->name('posts');


});

 Route::prefix('teachers')->name('Teacher.')->group(function(){

     Route::get('/' , [MainController::class,'index' ] )->name('index');




 });
