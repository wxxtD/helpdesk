<?php

namespace App\Http\Controllers;

use App\Models\Requete;
use App\Models\Solution;
use Illuminate\Http\Request;

class RequeteSolutionController extends Controller
{
    public function index(Requete $requete)
    {
        $solutions = Solution::where('requete_id', $requete->id)->latest()->paginate(5);
        return view('solutions.index', compact('solutions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Requete $requete)
    {

        return view('solutions.create', compact('requete'));
    }

    public function store(Request $request, Requete $requete)
    {
        $request->validate([
            'description' => 'required',
            'user_id' => 'required',
        ]);

        Solution::create([
            'description' => $request->input('description'),
            'requete_id' => $requete->id,
            'user_id' => $request->user_id,
        ]);
        $requete = Requete::find($requete->id);
        $requete->update([
            'request_case' => 'Traité',
        ]);


        return redirect()->route('requetes.solutions.index', $requete->id)
            ->with('success', 'Solution created successfully.');
    }

    public function show(Requete $requete, Solution $solution)
    {
        $requete_id = $requete->id; // Assuming you want to access the ID of the $requete model

        return view('solutions.show', compact('solution', 'requete', 'requete_id'));
    }


    public function edit(Requete $requete, Solution $solution)
    {
        return view('solutions.edit', compact('solution','requete'));
    }

    public function update(Request $request, Requete $requete, Solution $solution)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $solution->update([
            'description' => $request->input('description'),
        ]);

        return redirect()->route('requetes.solutions.index', $requete->id)
            ->with('success', 'Solution updated successfully');
    }

    public function destroy(Requete $requete, Solution $solution)
    {
        $solution->delete();

        return redirect()->route('requetes.solutions.index', $requete->id)
            ->with('success', 'Solution deleted successfully');
    }
}
