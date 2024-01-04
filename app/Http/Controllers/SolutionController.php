<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;


class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
    {
         $this->middleware('permission:solution-list|solution-create|solution-edit|solution-delete', ['only' => ['index','show']]);
         $this->middleware('permission:solution-create', ['only' => ['create','store']]);
         $this->middleware('permission:solution-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:solution-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::latest()->paginate(5);
        return view('solutions.index',compact('solutions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('solutions.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        request()->validate([
            'description' => 'required',
            // 'user_id' => 'required',
            // 'requete_id' => 'required',


        ]);

        Solution::create($request->all());

        return redirect()->route('solutions.index')
                        ->with('success','Solution created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solution  $Solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        return view('solutions.show',compact('solution'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solution $solution)
    {
        return view('solutions.edit',compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solution $solution)
    {
        request()->validate([
            'description' => 'required',
            // 'user_id' => 'required',
            // 'requete_id' => 'required',


        ]);

        $solution->update($request->all());

        return redirect()->route('solutions.index')
                        ->with('success','Solution updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solution $solution)
    {
        $solution->delete();

        return redirect()->route('solutions.index')
                        ->with('success','Solution deleted successfully');
    }
}
