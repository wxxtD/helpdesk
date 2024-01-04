<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;


class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
    {
         $this->middleware('permission:materiel-list|materiel-create|materiel-edit|materiel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:materiel-create', ['only' => ['create','store']]);
         $this->middleware('permission:materiel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:materiel-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiels = Materiel::latest()->paginate(5);
        return view('materiels.index',compact('materiels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('materiels.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required',
            'nom' => 'required',
            'marque' => 'required',
            'type' => 'required',
            'num' => 'required',

        ]);

        Materiel::create($request->all());

        return redirect()->route('materiels.index')
                        ->with('success','Materiel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiel  $Materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $Materiel)
    {
        return view('materiels.show',compact('materiel'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiel $materiel)
    {
        return view('materiels.edit',compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiel $materiel)
    {
        request()->validate([
            'code' => 'required',
            'nom' => 'required',
            'marque' => 'required',
            'type' => 'required',
            'num' => 'required',

        ]);

        $materiel->update($request->all());

        return redirect()->route('materiels.index')
                        ->with('success','Materiel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiel $materiel)
    {
        $materiel->delete();

        return redirect()->route('materiels.index')
                        ->with('success','Materiel deleted successfully');
    }
}
