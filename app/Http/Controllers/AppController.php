<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
  
    
 public function index(){

   return  view("welcome");

 }
  
 public function about(){
   return view('about');

 }
 public function contact(){
   return "contact Page";

 }
 public function news($id){
   return "News Id: $id";

 }

 public function calc($x , $y){

  $sum = $x + $y;
  $sub = $x - $y;
  $mul = $x * $y;
  $div = $x / $y;
  
   //passing with 3 ways: 
  // return view('result')->with("x" , $x)->with("y" , $y)->with("sum" , $sum);
  // return view('result' , [
  //  "x"=> $x,
  //  "y"=> $y,
  //  "sum"=> $sum,

  // ]);

  return view("result" , compact("x" , "y", "sum" , "sub" , "mul" , "div"));




 }

}
