<?php

namespace Caisse\Http\Controllers;

use Caisse\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    //lister les agences
    function index(){
            return view('agences.index');
    }
    //affiche le formumair de cration d'agance
     function create(){
        return view('agences.create');
     }
     // enregestrer une agance
    function store(){

    }
    //permet de récupirer une agence pui le mettre dans le formulaire
    function edit(){

    }
    //permet de modifier une agance
    function update(){

    }
    //permete de supprimer une agance
    function destory(){

    }


}
