<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $notes = Note::all();
        return view("note.index", ["notes" => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("note.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // dd($note->images);
        return view("note.show", ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        return view("note.edit", ['note' => $note]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

            $data = $request->validate(

         [

           'title' => 'required|string|max:100',
           'note' => 'required|string',
        //    'user_id'=> 'required|exists:users,id',
           'images'=> 'required|array',
           'images.*'=> 'image|mimes:jpg,png,gif,jprg,svg|max:1024',




         ]




            );
            $images = [];
            foreach($request->file('images') as $image){

                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/uploads', $imageName);
                $images[] = $imageName;


    }
    $data['images'] =  json_encode( $images) ?? '[]';
    $note = Note::create($data);

    return to_route('note.show', $note);
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
        $images = [];

        foreach ($request->file('images') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/uploads', $imageName);
            $images[] = $imageName;
        }

        $update_data = [
            'title' => $request->title,
            'note' => $request->note,
            'images' => json_encode( $images) ?? '[]',
        ];

        $note->update($update_data);

        return redirect()->route('note.show', ['note' => $note]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
        return redirect()->route('note.index');

    }
}
