<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view("todos.index",[
            "todos"=>$todos
        ]);
    }

    public function create(){
        return view("todos.create");
    }

    public function edit(){
        return view("todos.edit");
    }

    public function store(TodoRequest $request){
        Todo::create([
            "title" => $request->title,
            "description" => $request->description
        ]);

        $request->session()->flash("alert-success", "Task added successfully");
        return to_route("todos.index");
    }
}
