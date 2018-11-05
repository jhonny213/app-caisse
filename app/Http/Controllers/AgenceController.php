<?php

namespace Caisse\Http\Controllers;
use Caisse\Agence;
use Illuminate\Support\Facades\Auth;
use Caisse\Alimente;
use Caisse\Arrete;
use Illuminate\Http\Request;
class AgenceController extends Controller
{
    //lister les agences
    function index(){
        $listAgence = Agence::all();
        return view('agences.index',['agences' => $listAgence]);
    }
    //affiche le formumair de cration d'agance
     function create(){
        return view('agences.create');
     }
     // enregestrer une agance
    function store(Request $requeste){
        $agence = new Agence();
        $agence->name = $requeste->input('nom');
        $agence->wilaya = $requeste->input('wilaya');
        $agence->adresse = $requeste->input('adr');
        $agence->tel = $requeste->input('tel');
        $agence->caisse = 0;
        $agence->banque = 0;

        $agence->save();

        session()->flash('success','L\'agence à été bien enregestré !!');

        return redirect('agences');
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
