<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    //

    public function notes(){
        $notes = Note::all(); // Get all the notes of the DB

        return view('notes', @compact('notes'));
    }

    public function detail($id){
        $note = Note::findOrFail($id); // Get all the notes of the DB

        return view('notes/detail', @compact('note'));
    }

    public function create(Request $request){

        $request->validate(['nombre'=>'required',
                            'descripcion'=>'required']);

        $newNote = new Note;
        $newNote->nombre = $request->nombre;
        $newNote->descripcion = $request->descripcion;
        $newNote->save();

        return back()->with('mensaje', 'Nota agregada exitosamente');
    }

    public function edit($id){
        $note = Note::findOrFail($id); // Get all the notes of the DB

        return view('notes.edit', @compact('note'));
    }

    public function update(Request $request){

        $request->validate(['nombre'=>'required',
                            'descripcion'=>'required']);

        $updateNote = new Note;
        $updateNote->nombre = $request->nombre;
        $updateNote->descripcion = $request->descripcion;
        $updateNote->save();

        return back()->with('mensaje', 'Nota actualizada');
    }

    public function delete($id){
        $noteDelete = Note::findOrFail($id); // Get all the notes of the DB
        $noteDelete->delete();

        return back()->with('mensaje', 'Nota eliminada');
    }
}
