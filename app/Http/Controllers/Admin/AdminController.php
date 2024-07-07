<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        Log::info('Event Count: ' . $eventCount);
        Log::info('Association Count: ' . $associationCount);
        Log::info('User Count: ' . $userCount);
        return view('admin.dashboard', compact('eventCount', 'associationCount', 'userCount'));
    }

    // Evenement admin
    public function evenements()
    {
        list($eventCount, $associationCount, $userCount) = $this->getCounters();
        return view('admin.evenement', compact('eventCount', 'associationCount', 'userCount'));
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
}
