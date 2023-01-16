<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'todo' => 'required|min:5',
            'completed'
        ]);

        $request->session()->flash('success', 'Todo added successfully!');
        Todolist::create($data);
        return back();
    }

    public function updateEditableContent(Request $request)
    {
        $data = $request->validate([
            'todo' => 'required|min:5',
            'completed'
        ]);

        Todolist::where('id', $request->id)->update($data);
        return back();
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
