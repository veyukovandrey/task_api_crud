<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drag;

class DragController extends Controller
{
    public function index()
    {
        return Drag::all();
    }

    public function show(Drag $drag)
    {
        return $drag;
    }

    public function store(Request $request)
    {
        $drag = Drag::create($request->all());

        return response()->json($drag, 201);
    }

    public function update(Request $request, Drag $drag)
    {
        $drag->update($request->all());
        return response()->json($drag, 200);
    }

    public function delete(Drag $drag)
    {
        $drag->delete();

        return response()->json(null, 204);
    }
}
