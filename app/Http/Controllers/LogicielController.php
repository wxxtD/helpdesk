<?php

namespace App\Http\Controllers;
use App\Models\Logiciel;

use Illuminate\Http\Request;

class LogicielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:logiciel-list|logiciel-create|logiciel-edit|logiciel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:logiciel-create', ['only' => ['create','store']]);
         $this->middleware('permission:logiciel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:logiciel-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logiciels = Logiciel::latest()->paginate(5);
        return view('logiciels.index',compact('logiciels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('logiciels.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom' => 'required',
            'date_creation' => 'required',
            'licence' => 'required',
            'version' => 'required',
            'code_config' => 'required',

        ]);

        Logiciel::create($request->all());

        return redirect()->route('logiciels.index')
                        ->with('success','Logiciel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logiciel $logiciel)
    {
        return view('logiciels.show',compact('logiciel'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logiciel $logiciel)
    {
        return view('logiciels.edit',compact('logiciel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logiciel $logiciel)
    {
        request()->validate([
            'nom' => 'required',
            'code' => 'required',
            'date_creation' => 'required',
            'licence' => 'required',
            'version' => 'required',
            'code_config' => 'required',

        ]);

        $logiciel->update($request->all());

        return redirect()->route('logiciels.index')
                        ->with('success','Logiciel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logiciel $logiciel)
    {
        $logiciel->delete();

        return redirect()->route('logiciels.index')
                        ->with('success','Logiciel deleted successfully');
    }
}
