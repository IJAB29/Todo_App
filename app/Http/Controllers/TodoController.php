<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth; //new

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = $user->todos; // Using the relationship to fetch all Todos associated with the authenticated user.
        return view("todos.index", compact("todos"));
    }

    public function create()
    {
        return view("todos.create");
    }

    public function store(TodoRequest $request)
    {
        $user = Auth::user();
        $user->todos()->create([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        $request->session()->flash("alert-success", "Todo added successfully");
        return redirect()->route("todos.index"); // Correcting to_route to redirect()->route.
    }

    public function show($id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id); // Using the relationship to find the Todo associated with the authenticated user.
        if (!$todo) {
            return redirect()->route("todos.index")->withErrors([
                "error" => "Unable to locate the Todo"
            ]);
        }
        return view("todos.show", compact("todo"));
    }

    public function update(TodoRequest $request, $id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id); // Using the relationship to find the Todo associated with the authenticated user.
        if (!$todo) {
            $request->session()->flash("error", "Unable to locate Todo");
            return redirect()->route("todos.index")->withErrors([
                "error" => "Unable to locate the Todo"
            ]);
        }
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->status = $request->input('status');
        $todo->save();

        $request->session()->flash("alert-success", "Todo updated successfully");
        return redirect()->route("todos.index"); // Correcting to_route to redirect()->route.
    }

    public function delete(Request $request, $id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id); // Using the relationship to find the Todo associated with the authenticated user.
        if (!$todo) {
            $request->session()->flash("error", "Unable to locate Todo");
            return redirect()->route("todos.index")->withErrors([
                "error" => "Unable to locate the Todo"
            ]);
        }

        $todo->delete();

        $request->session()->flash("alert-success", "Todo deleted successfully");
        return redirect()->route("todos.index"); // Correcting to_route to redirect()->route.
    }
}
