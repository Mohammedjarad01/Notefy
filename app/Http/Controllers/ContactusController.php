<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{

  public function index(){




    return view("contactus");
  }

   public function store (Request $request){
    $name = $request->name;
    $subject = $request->subject;
    $email = $request->email;
    $age= $request->age;
    $msg = $request->message;
    // $messageContentSafe = htmlspecialchars($msg);
    Mail::send('emails.contact' , compact('name','subject','email','age','msg'), function ($message) use ($email,$name){

            $message->to($email);
            $message->subject($name);


});
return back()->with('success','Thank You For Contacting Us!!');
}
}
