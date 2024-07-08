<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Organisme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private function getCounters()
    {
        $eventCount = Evenement::count();
        $associationCount = Organisme::count();
        $userCount = User::count();

        return [$eventCount, $associationCount, $userCount];
    }

    // Index admin
    public function dashboard()
    {
        list($eventCount, $associationCount, $userCount) = $this->getCounters();
        return view('admin.dashboard', compact('eventCount', 'associationCount', 'userCount'));
    }

    public function evenements()
    {
        list($eventCount, $associationCount, $userCount) = $this->getCounters();

        // Récupérer uniquement les événements des associations actives
        $events = Evenement::whereHas('organisme', function ($query) {
            $query->where('is_active', true);
        })->get();

        return view('admin.evenement', compact('eventCount', 'associationCount', 'userCount', 'events'));
    }

    // Association admin
    public function association()
    {
        list($eventCount, $associationCount, $userCount) = $this->getCounters();
        $associations = Organisme::all();
        return view('admin.association', compact('eventCount', 'associationCount', 'userCount', 'associations'));
    }

    // Afficher la liste des utilisateurs
    public function utilisateur()
    {
        list($eventCount, $associationCount, $userCount) = $this->getCounters();

        // Exclure les utilisateurs ayant le rôle d'administrateur
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('admin.utilisateur', compact('eventCount', 'associationCount', 'userCount', 'users'));
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

    // Désactiver ou activer une association
    public function toggleAssociation($id)
    {
        $association = Organisme::find($id);
        if ($association) {
            $association->is_active = !$association->is_active;
            $association->save();
            return redirect()->route('admin.association')->with('success', 'Statut de l\'association mis à jour avec succès.');
        }
        return redirect()->route('admin.association')->with('error', 'Association introuvable.');
    }
}
