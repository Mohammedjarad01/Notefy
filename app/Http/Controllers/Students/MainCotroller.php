<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainCotroller extends Controller
{
    

     public function index(){

       
      return view('students.index');


     }


}
