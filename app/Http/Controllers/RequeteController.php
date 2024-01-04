<?php

namespace App\Http\Controllers;

use App\Models\Requete;
use Illuminate\Http\Request;
use DB;

class RequeteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:requete-list|requete-create|requete-edit|requete-delete', ['only' => ['index','show']]);
         $this->middleware('permission:requete-create', ['only' => ['create','store']]);
         $this->middleware('permission:requete-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:requete-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('USER')) {
            # code...
            $requetes = Requete::where('user_id',auth()->user()->id)->latest()->get();
        }else if(auth()->user()->hasRole('INTERVENANT MATERIELE',)){
            $requetes = Requete::where('type', 'Materielle',auth()->user()->id)->latest()->get();
        }
        else if (auth()->user()->hasRole('ADMIN')) {
            $requetes = Requete::latest()->get();

        }
        else {
            $requetes = Requete::where('type', 'Logiciel',auth()->user()->id)->latest()->get();


        }
            return view('requetes.index', compact('requetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $users = User::where();
        return view('requetes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'datepanne' => 'required',
            'nature' => 'required',
            'type' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'image' => 'required',
            'request_case' => 'required'


        ]);


        // Store the uploaded image in the public directory
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');
            // The above line will store the image in the public/images directory.
        }

        $data = $request->all();
        $data['image'] = $imagePath;
        // Créez un nouveau client en utilisant les données validées
        // $requete = Requete::create($validatedData);

        Requete::create($data);

        return redirect()->route('requetes.index')
                        ->with('success','Requete created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requete  $Requete
     * @return \Illuminate\Http\Response
     */
    public function show(Requete $requete)
    {
        return view('requetes.show',compact('requete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requete  $Requete
     * @return \Illuminate\Http\Response
     */
    public function edit(Requete $requete)
    {
        return view('requetes.edit',compact('requete'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requete  $Requete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requete $requete)
    {
         request()->validate([
            'datepanne' => 'required',
            'nature' => 'required',
            'type' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'image' => 'required',
            'request_case' => 'required'





        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');
            // The above line will store the image in the public/images directory.
        }
        $data = $request->all();
        $data['image'] = $imagePath;
        // Créez un nouveau client en utilisant les données validées
        // $requete = Requete::create($validatedData);


        $requete->update( $data);
        $requete->save() ;

        return redirect()->route('requetes.index')
                        ->with('success','Requete updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requete  $Requete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requete $requete)
    {
        $requete->delete();

        return redirect()->route('requetes.index')
                        ->with('success','Requete deleted successfully');
    }
}
