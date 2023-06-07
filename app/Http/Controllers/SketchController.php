<?php

namespace App\Http\Controllers;

use App\Models\Sketch;
use App\Models\User;
use Illuminate\Http\Request;

class SketchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sketches = Sketch::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
        return view('sketches.panel', compact('sketches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sketches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sketch = Sketch::create($request->all());
        $sketch->save();
        /* $id = $sketch->id; */
        /* return redirect()->route('design.edit', ['id' => $id]); */
        return redirect()->route('sketch.edit', ['id' => $sketch->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sketch $sketch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sketch = Sketch::find($id);
        return view('sketches.edit', ['sketch' => $sketch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $sketch = Sketch::where('id',$request->id)->first();
        if($sketch){
            $sketch->update($request->all());
            return redirect()->back()->with('success', 'Se ha actualizado.');
        }
        return redirect()->back()->with('error', 'No se pudo actualizar.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sketch = Sketch::find($id);
        if ($sketch) {
            $sketch->delete();
            return redirect()->back()->with('success', 'Se eliminó el sketch.');
        }
        return redirect()->back()->with('error', 'No se pudo eliminar el sketch.');
    }
}