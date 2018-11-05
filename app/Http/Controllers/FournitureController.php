<?php

namespace Caisse\Http\Controllers;

use Caisse\Fourniture;
use Illuminate\Http\Request;

class FournitureController extends Controller
{

    public function index(){
        $fournitures  = Fourniture::all();
        return view('fournitures.index',['fournitures' => $fournitures]);

    }

    function create(){
        return view('fournitures.create');
    }
    function store(Request $requeste){
        $fourniture = new Fourniture();
        $fourniture->libelle = $requeste->input('libelle');
        $fourniture->desc = $requeste->input('description');

        $fourniture->save();

        session()->flash('success','La fourniture à été bien enregestré !!');
        return redirect('fournitures');

    }
    function edit(){

    }
    function update(){

    }
    function destory(){

    }
}
