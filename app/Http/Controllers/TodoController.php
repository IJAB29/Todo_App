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

    public function store(TodoRequest $request){
        Todo::create([
            "title" => $request->title,
            "description" => $request->description
        ]);

        $request->session()->flash("alert-success", "Task added successfully");
        return to_route("todos.index");
    }

    public function show($id){
        $todo = Todo::find($id);
        if(! $todo){
            return to_route("todos.index")->withErrors([
                "error" => "unable to locate the Todo"
            ]);
        }
        return view("todos.show", [
            "todo"=>$todo
        ]);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->status = $request->input('status');
        $todo->save();

        $request->session()->flash("alert-success", "Task added successfully");
        return to_route("todos.index");
    }

    // public function delete(Request $request){

    // }
}
