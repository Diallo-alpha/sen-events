<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function __construct()
    {
        // Appliquez le middleware auth et organisme
        // $this->middleware(['auth', 'organisme']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */

//      public function create()
// {
//     $evenement = Evenement::find($id); // Fetch the event you need
//     return view('reservations.create', compact('evenement'));
// }

// public function create()
// {
//     $evenement = Evenement::find($id); // Replace $id with the actual ID or route parameter
//     if (!$evenement) {
//         return redirect()->back()->with('error', 'Event not found');
//     }
//     return view('reservations.create', compact('evenement'));
// }
public function create($id)
{
    $evenement = Evenement::find($id);
    if (!$evenement) {
        return redirect()->back()->with('error', 'Event not found');
    }
    return view('reservations.create', compact('evenement'));
}

    // public function create()
    // {
    //     return view('evenements.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'date_evenement' => 'required|date',
            'lieu' => 'required|string|max:255',
            'places_disponible' => 'required|integer',
            'date_limite' => 'required|date',
            'photo' => 'nullable|image|max:12048',
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos') : null;

        Evenement::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'date_evenement' => $request->date_evenement,
            'lieu' => $request->lieu,
            'places_disponible' => $request->places_disponible,
            'date_limite' => $request->date_limite,
            'photo' => $photoPath,
            'organisme_id' => auth()->user()->id,
        ]);

        return redirect()->route('evenement.index')->with('success', 'Événement créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'date_evenement' => 'required|date',
            'lieu' => 'required|string|max:255',
            'places_disponible' => 'required|integer',
            'date_limite' => 'required|date',
            'photo' => 'nullable|image|max:12048',
        ]);

        $evenement = Evenement::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
        } else {
            $photoPath = $evenement->photo;
        }

        $evenement->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'date_evenement' => $request->date_evenement,
            'lieu' => $request->lieu,
            'places_disponible' => $request->places_disponible,
            'date_limite' => $request->date_limite,
            'photo' => $photoPath,
        ]);

        return redirect()->route('evenement.index')->with('success', 'Événement mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        return redirect()->route('evenement.index')->with('success', 'Événement supprimé avec succès');
    }
}
