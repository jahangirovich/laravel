<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Response;

class CrudController extends Controller
{
    public function getAll(){
        $todo = Todo::all();

        return view('welcome')->with(compact('todo'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $todo = Todo::create($data);

        return Response::json($todo);
    }
}
