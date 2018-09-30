<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;

class GroupsController extends Controller
{
    public function index()
    {
        return Groups::all();
    }

    public function show(Groups $groups)
    {
        return $groups;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|unique:groups|max:255',
            'descricao' => 'required'
        ]);
        
        $groups = Groups::create($request->all());

        return response()->json($groups, 201);
    }

    public function update(Request $request, Groups $groups)
    {
        $groups->update($request->all());

        return response()->json($groups, 200);
    }

    public function delete(Groups $groups)
    {
        $groups->delete();

        return response()->json(null, 204);
    }
}
