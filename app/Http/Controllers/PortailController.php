<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PortailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer uniquement les événements dont la date n'est pas dépassée et ajouter la pagination
        $evenements = Evenement::where('date_evenement', '>=', Carbon::now())->paginate(6);
        return view('portail.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($id)
    {
        $evenement = Evenement::find($id);
        return view('portail.detailsEvents', compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
