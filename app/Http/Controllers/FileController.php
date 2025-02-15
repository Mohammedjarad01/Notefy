<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
   public function index()
    {
        return view("upload");
    }
     public function upload(Request $request)
    {
        $file = $request->file("image");
        $filename = $file->getClientOriginalName();
        $file->storeAs("public/uploads", $filename);

        return back()->with("success", "File Uplaoded Successfuly")->with("image", $filename);
    }
}
