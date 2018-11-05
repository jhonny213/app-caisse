<?php

namespace Caisse\Http\Controllers;

use Caisse\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index(){
        $fournisseur  = Fournisseur::all();
        return view('fournisseurs.index',['fournisseurs' => $fournisseur]);
    }

    function create(){
        return view('fournisseurs.create');

    }
    function store(Request $requeste){
        $fournisseur = new Fournisseur();
        $fournisseur->name = $requeste->input('nom');
        $fournisseur->reson_social = $requeste->input('reson_social');
        $fournisseur->adresse = $requeste->input('adr');
        $fournisseur->tel = $requeste->input('tel');
        $fournisseur->site_web = $requeste->input('site');
        $fournisseur->email = $requeste->input('email');

        $fournisseur->save();

        session()->flash('success','Le fournisseur à été bien enregestré !!');
        return redirect('fournisseurs');
    }
    function edit(){

    }
    function update(){

    }
    function destory(){

    }
}
