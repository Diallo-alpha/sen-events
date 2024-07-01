<?php
namespace App\Http\Controllers;
use App\Models\Organisme;
use Illuminate\Http\Request;

class OrganismeController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all organismes from the database
        $organismes = Organisme::all();

        // Return the index view and pass the organismes data
        return view('organismes.index', compact('organismes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the create view
        return view('organismes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string',
            'secteur_activite' => 'required|string',
            'ninea' => 'required|string|max:255',
            'date_creation' => 'required|date',
        ]);

        // Create a new Organisme using the request data
        Organisme::create($request->all());

        // Redirect to the index route with a success message
        return redirect()->route('organismes.index')->with('success', 'Organisme created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function show(Organisme $organisme)
    {
        // Return the show view and pass the organisme data
        return view('organismes.show', compact('organisme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisme $organisme)
    {
        // Return the edit view and pass the organisme data
        return view('organismes.edit', compact('organisme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisme $organisme)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string',
            'secteur_activite' => 'required|string',
            'ninea' => 'required|string|max:255',
            'date_creation' => 'required|date',
        ]);

        // Update the Organisme with the new data
        $organisme->update($request->all());

        // Redirect to the index route with a success message
        return redirect()->route('organismes.index')->with('success', 'Organisme updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisme $organisme)
    {
        // Delete the specified Organisme
        $organisme->delete();

        // Redirect to the index route with a success message
        return redirect()->route('organismes.index')->with('success', 'Organisme deleted successfully.');
    }
}