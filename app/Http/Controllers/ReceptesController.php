<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use IlluminateSupportFacadesRoute;
//use AppHttpControllersReceptesController;
use App\Models\Recepta;

class ReceptesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //prova
        $receptes = Recepta::all();

        return view('receptes.index', compact('receptes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titol' => 'required|max:255',
            'descripcio' => 'required',
          ]);
          Recepta::create($request->all());
          return redirect()->route('receptes.index')
            ->with('success','Recipt created successfully.');
    }

    public function create()
    {
      return view('receptes.create');
    }

    public function edit($id)
    {
        $recepta = Recepta::find($id);
        return view('receptes.edit', compact('recepta'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $recepta = Recepta::find($id);
        return view('receptes.show', compact('recepta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titol' => 'required|max:255',
            'descripcio' => 'required',
          ]);
          $recepta = Recepta::find($id);
          $recepta->update($request->all());
          return redirect()->route('receptes.index')
            ->with('success', 'Receipt updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recepta = Recepta::find($id);
        $recepta->delete();
        return redirect()->route('receptes.index')
            ->with('success', 'Receipt deleted successfully');
    }
}
