<?php

namespace Caisse\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Caisse\Achat;
use Illuminate\Http\Request;
use Caisse\Http\Requests\AchatRequestt;
use Caisse\Fourniture;
use Caisse\Fournisseur;
use Caisse\User;
use Caisse\Agence;
class AchatController extends Controller
{

    public function index(){
        if(Auth::user()->groupe == 'Administrateur') {
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*', 'users.id', 'users.username', 'fournisseurs.id', 'fournisseurs.name AS fornis_name',
                'fournisseurs.reson_social', 'fournitures.id', 'fournitures.libelle')->get();
        }else{
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('agences', 'users.agence_id', '=', 'agences.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*', 'users.id', 'users.username', 'users.agence_id',
                'agences.id', 'agences.name AS agance_name', 'fournisseurs.id', 'fournisseurs.name AS fornis_name',
                'fournisseurs.reson_social', 'fournitures.id', 'fournitures.libelle')->
            where('achats.user_id', Auth::user()->id)
                ->get();
        }
        return view('achats.index',['achats' => $listAchats]);
    }
    public function create(){
        $fournisseur  = Fournisseur::select('fournisseurs.id','fournisseurs.name','fournisseurs.reson_social')->get();
        $fournitures  = Fourniture::select('fournitures.id','fournitures.libelle')->get();
        return view('achats.create',['fournitures' => $fournitures, 'fournisseur' =>$fournisseur]);
    }
    public function store(AchatRequestt $requeste){
        //recupiré le solde actuelle de l'agence
        $sold_caisse = User::join('agences','users.agence_id','=','agences.id')->
        select('users.id','agences.caisse')->
        where('users.id',Auth::user()->id)->first();

        //acheté
        $achat = new Achat();

        $achat->user_id = Auth::user()->id;
        $achat->fournisseur_id = $requeste->input('fournisseur');
        $achat->fourniture_id = $requeste->input('fourniture');
        $achat->machat = $requeste->input('machat');
        $achat->prix = $requeste->input('prix');
        $achat->validation = 0;
        $achat->desc = $requeste->input('desc');


        $saved = $achat->save();
        //if acheté new sold
        if($saved){
            $new_somme =  $sold_caisse->caisse - $requeste->input('prix');

            $new_sold = Agence::find($sold_caisse->id);
            $new_sold->caisse = $new_somme;

            $new_sold->save();

            session()->flash('success','La demande d\'achat à été bien enregestré !!');

            return redirect('achats');
        }

    }

}
