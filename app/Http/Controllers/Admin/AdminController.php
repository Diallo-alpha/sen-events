<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index admin
    public function dashboard()
        {
            return view('admin.dashboard');
        }
    //evenement admin
    public function evenements()
        {
            return view('admin.evenement');
        }
    //association admin
    public function association()
        {
            return view('admin.association');
        }
    //afficher la liste des utilisateur
    public function utilisateur()
        {
            return view('admin.utilisateur');
        }
}
