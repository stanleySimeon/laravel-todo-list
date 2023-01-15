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
    $data = $request -> validate([
        'todo' => 'required'
    ]);

    Todolist::create($data);
    return back();
  }

  public function edit(Todolist $todolist)
  {
    // $todolist->isCompleted = !$todolist->isCompleted;
    // $todolist->save();
    // return back();
  }

  public function destroy(Todolist $todolist)
  {
    $todolist->delete();
    return back();
  }
}
