<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{



/**
     * Display a listing of the resource.
     */

     function __construct()
    {
         $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index','show']]);
         $this->middleware('permission:faq-create', ['only' => ['create','store']]);
         $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(5);
        return view('faqs.index',compact('faqs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('faqs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        request()->validate([
            'problem' => 'required',
            'solution' => 'required',



        ]);

        Faq::create($request->all());

        return redirect()->route('faqs.index')
                        ->with('success','Faq created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $Faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('faqs.show',compact('faq'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        request()->validate([
            'problem' => 'required',
            'solution' => 'required',


        ]);

        $faq->update($request->all());

        return redirect()->route('faqs.index')
                        ->with('success','Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')
                        ->with('success','Faq deleted successfully');
    }



}
