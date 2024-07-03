<?php

// namespace App\Http\Controllers;

// use App\Models\Evenement;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class EvenementController extends Controller
// {

    // Cette méthode affichera la page des événements
    // public function index()
    // {
    //     $evenements = Evenement::orderBy('created_at', 'DESC')->get();
    //     return view('evenements.list', ['evenements' => $evenements]);
    // }

    // Cette méthode affichera la page de création d'événement
    // public function create()
    // {
    //     return view('evenements.create');
    // }

    // Cette méthode enregistrera un événement dans la base de données
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'nom' => 'required|min:5',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'description' => 'nullable|string',
    //         'date_evenement' => 'required|date',
    //         'lieu' => 'required|string|min:3',
    //         'places_disponible' => 'required|integer|min:1',
    //         'date_limite' => 'nullable|date',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return redirect()->route('evenements.create')->withInput()->withErrors($validator);
    //     }

    //     $evenement = new Evenement();
    //     $evenement->nom = $request->nom;
    //     $evenement->description = $request->description;
    //     $evenement->date_evenement = $request->date_evenement;
    //     $evenement->lieu = $request->lieu;
    //     $evenement->places_disponible = $request->places_disponible;
    //     $evenement->date_limite = $request->date_limite;
    //     $evenement->organisme_id = $request->organisme_id;

    //     $evenement = new Evenement();
    //     $evenement->fill($request->except('photo'));

    //     if ($request->hasFile('photo')) {
    //         $imageName = time().'.'.$request->photo->extension();
    //         $request->photo->move(public_path('images'), $imageName);
    //         $evenement->photo = $imageName;
    //     }

    //     $evenement->save();

    //     return redirect()->route('evenements.index')->with('success', 'Evenement ajouté avec succès.');
    // }

    // Cette méthode affichera la page d'édition d'événement
    // public function edit($id)
    // {
    //     $evenement = Evenement::findOrFail($id);
    //     return view('evenements.edit', ['evenement' => $evenement]);
    // }

    // // Cette méthode mettra à jour un événement
    // public function update(Request $request, $id)
    // {
    //     $rules = [
    //         'nom' => 'required|min:5',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'description' => 'nullable|string',
    //         'date_evenement' => 'required|date',
    //         'lieu' => 'required|string|min:3',
    //         'places_disponible' => 'required|integer|min:1',
    //         'date_limite' => 'nullable|date',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return redirect()->route('evenements.edit', $id)->withInput()->withErrors($validator);
    //     }

    //     $evenement = Evenement::findOrFail($id);
    //     $evenement->nom = $request->nom;
    //     $evenement->description = $request->description;
    //     $evenement->date_evenement = $request->date_evenement;
    //     $evenement->lieu = $request->lieu;
    //     $evenement->places_disponible = $request->places_disponible;
    //     $evenement->date_limite = $request->date_limite;

    //     $evenement = Evenement::findOrFail($id);
    //     $evenement->fill($request->except('photo'));

    //     if ($request->hasFile('photo')) {
    //         $imageName = time().'.'.$request->photo->extension();
    //         $request->photo->move(public_path('images'), $imageName);
    //         $evenement->photo = $imageName;
    //     }
    //     $evenement->save();

    //     return redirect()->route('evenements.index')->with('success', 'Evenement mis à jour avec succès.');
    // }

    // // Cette méthode supprimera un événement
    // public function destroy($id)
    // {
    //     $evenement = Evenement::findOrFail($id);
    //     $evenement->delete();

    //     return redirect()->route('evenements.index')->with('success', 'Evenement supprimé avec succès.');
    // }
// }



namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvenementController extends Controller
{
    // Cette méthode affichera la page des événements
    public function index()
    {
        $evenements = Evenement::orderBy('created_at', 'DESC')->get();
        return view('evenements.list', ['evenements' => $evenements]);
    }

    // Cette méthode affichera la page de création d'événement
    public function create()
    {
        return view('evenements.create');
    }

    // Cette méthode enregistrera un événement dans la base de données
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required|min:5',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'date_evenement' => 'required|date',
            'lieu' => 'required|string|min:3',
            'places_disponible' => 'required|integer|min:1',
            'date_limite' => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('evenements.create')->withInput()->withErrors($validator);
        }

        $evenement = new Evenement();
        $evenement->fill($request->except('photo'));

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $evenement->photo = $imageName;
        }

        $evenement->save();

        return redirect()->route('evenements.index')->with('success', 'Evenement ajouté avec succès.');
    }

    // Cette méthode affichera la page d'édition d'événement
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit', ['evenement' => $evenement]);
    }

    // Cette méthode mettra à jour un événement
    public function update(Request $request, $id)
    {
        $rules = [
            'nom' => 'required|min:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'date_evenement' => 'required|date',
            'lieu' => 'required|string|min:3',
            'places_disponible' => 'required|integer|min:1',
            'date_limite' => 'nullable|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('evenements.edit', $id)->withInput()->withErrors($validator);
        }

        $evenement = Evenement::findOrFail($id);
        $evenement->fill($request->except('photo'));

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $evenement->photo = $imageName;
        }

        $evenement->save();

        return redirect()->route('evenements.index')->with('success', 'Evenement mis à jour avec succès.');
    }

    // Cette méthode supprimera un événement
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Evenement supprimé avec succès.');
    }
}

