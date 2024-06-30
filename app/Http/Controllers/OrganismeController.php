<?php
namespace App\Http\Controllers;

use App\Models\Organisme;
use Illuminate\Http\Request;

class OrganismeController extends Controller
{
    public function index()
    {
        $organismes = Organisme::all();
        return view('/index', compact('organismes'));
    }

    public function create()
    {
        return view('create');
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

        return redirect()->route('index')->with('success', 'Organisme created successfully.');
    }

    public function show(Organisme $organisme)
    {
        return view('show', compact('organisme'));
    }

    public function edit(Organisme $organisme)
    {
        return view('edit', compact('organisme'));
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

        return redirect()->route('index')->with('success', 'Organisme updated successfully.');
    }

    public function destroy(Organisme $organisme)
    {
        $organisme->delete();

        return redirect()->route('index')->with('success', 'Organisme deleted successfully.');
    }
}
