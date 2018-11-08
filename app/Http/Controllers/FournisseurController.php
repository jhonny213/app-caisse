<?php

namespace Caisse\Http\Controllers;
use Auth;
use Caisse\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $fournisseur  = Fournisseur::join('agences','fournisseurs.agence_id','agences.id')
                ->select('fournisseurs.*','fournisseurs.id AS IDfournisseur','agences.name AS NameAgence','agences.id')->
                get();
        }else{
            $fournisseur  = Fournisseur::where('fournisseurs.agence_id',Auth::user()->agence_id)->
            select('fournisseurs.*','fournisseurs.id AS IDfournisseur')->
            get();
        }

        return view('fournisseurs.index',['fournisseurs' => $fournisseur]);
    }
    // affichier les fournisseurs blocké
    public function show(){
        if(Auth::user()->groupe == 'Administrateur'){
            $fournisseur  = Fournisseur::join('agences','fournisseurs.agence_id','agences.id')
                ->select('fournisseurs.*','fournisseurs.id AS IDfournisseur','agences.name AS NameAgence','agences.id')->
                onlyTrashed()->get();
        }else{
            $fournisseur  = Fournisseur::where('fournisseurs.agence_id',Auth::user()->agence_id) ->
            select('fournisseurs.*','fournisseurs.id AS IDfournisseur')->
                onlyTrashed()->get();
        }

        return view('fournisseurs.blocke',['fournisseurs' => $fournisseur]);
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
        $fournisseur->agence_id =  Auth::user()->agence_id;
        $fournisseur->save();

        session()->flash('success','Le fournisseur à été bien enregestré !!');
        return redirect('fournisseurs');
    }
    function edit($id){
        $fournisseur = Fournisseur::find($id);
        return view('fournisseurs.edit',['fournisseur'=>$fournisseur]);
    }

    public function update(Request $requeste, $id){
        $fournisseur = Fournisseur::find($id);

        $fournisseur->name = $requeste->input('nom');
        $fournisseur->reson_social = $requeste->input('reson_social');
        $fournisseur->adresse = $requeste->input('adr');
        $fournisseur->tel = $requeste->input('tel');
        $fournisseur->site_web = $requeste->input('site');
        $fournisseur->email = $requeste->input('email');

        $fournisseur->save();

        session()->flash('success','Le fournisseur à été bien Modifier !!');

        return redirect('fournisseurs/');

    }
    public function destroy($id){

        $fournisseur = Fournisseur::find($id);

            $fournisseur->delete();

        return redirect('/fournisseurs/');
    }
    public function redestroy($id){
       // $fournisseur = Fournisseur::find($id);
        Fournisseur::withTrashed()
            ->where('id', $id)
            ->restore();
        return back();

    }
}
