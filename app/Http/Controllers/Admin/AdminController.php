<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Association;
use App\Models\Organisme;
use App\Models\User;

class AdminController extends Controller
{
    // Index admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Evenement admin
    public function evenements()
    {
        return view('admin.evenement');
    }

    // Association admin
    public function association()
    {
        $associations = Organisme::all();
        return view('admin.association', compact('associations'));
    }

    // Afficher la liste des utilisateurs
    public function utilisateur()
    {
        $users = User::all();
        return view('admin.utilisateur', compact('users'));
    }

    // Supprimer un utilisateur
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.utilisateur')->with('success', 'Utilisateur supprimé avec succès.');
        }
        return redirect()->route('admin.utilisateur')->with('error', 'Utilisateur introuvable.');
    }

    // Supprimer une association
    public function deleteAssociation($id)
    {
        $association = Organisme::find($id);
        if ($association) {
            $association->delete();
            return redirect()->route('admin.association')->with('success', 'Association supprimée avec succès.');
        }
        return redirect()->route('admin.association')->with('error', 'Association introuvable.');
    }
}
