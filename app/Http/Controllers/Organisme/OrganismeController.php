<?php

namespace App\Http\Controllers\Organisme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganismeController extends Controller
{
    //view dashboard organisme
    public function index()
    {
       return view('organisme.dashboard');
    }

    //view inscrit organisme
    public function inscrit ()
        {
            return view('organisme.inscrit');
        }
    //view evenements 
    public function evenements ()
        {
            return view('organisme.evenement');
        }
    public function create()
    {
        return view('organisme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'secteur_activite' => 'required',
            'ninea' => 'required',
            'date_creation' => 'required|date',
        ]);

        Organisme::create($request->all());

        return redirect()->route('organismes.index')->with('success', 'Organisme created successfully.');
    }

    public function show(Organisme $organisme)
    {
        return view('organismes.show', compact('organisme'));
    }

    public function edit(Organisme $organisme)
    {
        return view('organismes.edit', compact('organisme'));
    }

    public function update(Request $request, Organisme $organisme)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'secteur_activite' => 'required',
            'ninea' => 'required',
            'date_creation' => 'required|date',
        ]);

        $organisme->update($request->all());

        return redirect()->route('organismes.index')->with('success', 'Organisme updated successfully.');
    }

    public function destroy(Organisme $organisme)
    {
        $organisme->delete();

        return redirect()->route('organismes.index')->with('success', 'Organisme deleted successfully.');
    }
}
