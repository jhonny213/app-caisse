<?php

namespace Caisse\Http\Controllers;

use Auth;
use Caisse\Fourniture;
use Illuminate\Http\Request;

class FournitureController extends Controller
{

    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $fournitures  = Fourniture::join('agences','fournitures.agence_id','agences.id')
                ->select('fournitures.*','fournitures.id AS IDfourniture','agences.name AS NameAgence','agences.id')->
                get();
        }else{
            $fournitures  = Fourniture::where('fournitures.agence_id',Auth::user()->agence_id)->
            select('fournitures.*','fournitures.id AS IDfourniture')->
            get();
        }
        return view('fournitures.index',['fournitures' => $fournitures]);

    }

    public function show(){
        if(Auth::user()->groupe == 'Administrateur') {
            $fournitures  = Fourniture::join('agences','fournitures.agence_id','agences.id')->
            select('fournitures.*','fournitures.id AS IDfourniture','agences.name AS NameAgence','agences.id')->
                onlyTrashed()->get();
        }else{
            $fournitures  = Fourniture::where('fournitures.agence_id',Auth::user()->agence_id)->
            select('fournitures.*','fournitures.id AS IDfourniture')->
            onlyTrashed()->get();
        }
        return view('fournitures.blocke',['fournitures' => $fournitures]);

    }

    function create(){
        return view('fournitures.create');
    }
    function store(Request $requeste){
        $fourniture = new Fourniture();
        $fourniture->libelle = $requeste->input('libelle');
        $fourniture->desc = $requeste->input('description');
        $fourniture->agence_id =  Auth::user()->agence_id;

        $fourniture->save();

        session()->flash('success','La fourniture à été bien enregestré !!');
        return redirect('fournitures');

    }
    function edit($id){
        $fourniture = Fourniture::find($id);
        return view('fournitures.edit',['fourniture'=>$fourniture]);
    }
    function update(Request $requeste, $id){

        $fourniture = Fourniture::find($id);
        $fourniture->libelle = $requeste->input('libelle');
        $fourniture->desc = $requeste->input('description');
        $fourniture->save();

        session()->flash('success','La fourniture à été bien modifier !!');
        return redirect('fournitures');
    }
    public function destroy($id){

        $fournisseur = Fourniture::find($id);

        $fournisseur->delete();

        return back();
    }
    public function redestroy($id){
        Fourniture::withTrashed()
            ->where('id', $id)
            ->restore();
        return back();

    }
}
