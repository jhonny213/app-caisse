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
            join('agences', 'agences.id', '=', 'achats.agence_id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username','users.agence_id', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle','agences.id', 'agences.name')->
            where('achats.validation', 1)
                ->get();

        }elseif(Auth::user()->groupe == 'Directeur'){
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.validation', 1)->
            where('achats.agence_id', Auth::user()->agence_id)
                ->get();
        }elseif(Auth::user()->groupe == 'Gestionnaire'){
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.validation', 1)->
            where('achats.user_id',Auth::user()->id)
                ->get();
        }
        return view('achats.index',['achats' => $listAchats]);
    }
    public function cmd(){
        if(Auth::user()->groupe == 'Administrateur') {
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            join('agences', 'agences.id', '=', 'achats.agence_id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username','users.agence_id', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle','agences.id', 'agences.name')->
            where('achats.validation', 0)
                ->get();

        }elseif(Auth::user()->groupe == 'Directeur'){
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.agence_id', Auth::user()->agence_id)->
            where('achats.validation', 0)
                ->get();
        }elseif(Auth::user()->groupe == 'Gestionnaire'){
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.user_id',Auth::user()->id)->
            where('achats.validation', 0)
                ->get();
        }
        return view('achats.cmd',['achats' => $listAchats]);
    }
    public function refus(){
        if(Auth::user()->groupe == 'Administrateur') {
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            join('agences', 'agences.id', '=', 'achats.agence_id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username','users.agence_id', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle','agences.id', 'agences.name')->
            where('achats.validation', 2)
                ->get();

        }elseif(Auth::user()->groupe == 'Directeur'){
            $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.agence_id', Auth::user()->agence_id)->
            where('achats.validation', 2)
                ->get();
        }elseif(Auth::user()->groupe == 'Gestionnaire'){
           $listAchats = Achat::join('users', 'achats.user_id', '=', 'users.id')->
            join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')->
            join('fournitures', 'achats.fourniture_id', '=', 'fournitures.id')->
            select('achats.*','achats.id AS IDAchat', 'users.id', 'users.username', 'fournisseurs.id',
                'fournisseurs.name AS fornis_name', 'fournisseurs.reson_social',
                'fournitures.id', 'fournitures.libelle')->
            where('achats.user_id',Auth::user()->id)->
            where('achats.validation', 2)
                ->get();


        }
        return view('achats.cmd',['achats' => $listAchats]);
    }
    public function create(){
        $fournisseur  = Fournisseur::select('fournisseurs.id','fournisseurs.name','fournisseurs.reson_social')->
        where('fournisseurs.agence_id',Auth::user()->agence_id)->get();
        $fournitures  = Fourniture::select('fournitures.id','fournitures.libelle')->
        where('fournitures.agence_id',Auth::user()->agence_id)->get();
        return view('achats.create',['fournitures' => $fournitures, 'fournisseur' =>$fournisseur]);
    }
    public function store(AchatRequestt $requeste){


        //acheté
        $achat = new Achat();

        $achat->user_id = Auth::user()->id;
        $achat->agence_id = Auth::user()->agence_id;
        $achat->fournisseur_id = $requeste->input('fournisseur');
        $achat->fourniture_id = $requeste->input('fourniture');
        $achat->machat = $requeste->input('machat');
        $achat->prix = $requeste->input('prix');
        $achat->qantite = $requeste->input('Quantite');
        $achat->validation = 0;
        $achat->desc = $requeste->input('desc');


        $achat->save();

            session()->flash('success','La demande d\'achat à été bien enregestré !!');

            return redirect('achats/cmd');

    }
    public function edit($id){
        $achat = Achat::find($id);
        $fournisseur  = Fournisseur::select('fournisseurs.id','fournisseurs.name','fournisseurs.reson_social')->get();
        $fournitures  = Fourniture::select('fournitures.id','fournitures.libelle')->get();
        return view('achats.edit',['fournitures' => $fournitures, 'fournisseur'=>$fournisseur, 'achat' =>$achat]);

    }
    public function update(AchatRequestt $requeste, $id){
        //recupiré le solde actuelle de l'agence
        $sold_caisse = User::join('agences','users.agence_id','=','agences.id')->
        select('users.id','agences.caisse')->
        where('users.id',Auth::user()->id)->first();


        $achat = Achat::find($id)->first();
        $achat->fournisseur_id = $requeste->input('fournisseur');
        $achat->fourniture_id = $requeste->input('fourniture');
        $achat->machat = $requeste->input('machat');
        $achat->prix = $requeste->input('prix');
        $achat->qantite = $requeste->input('Quantite');
        $achat->desc = $requeste->input('desc');

        $achat->save();

        session()->flash('success','La demande d\'achat à été bien Modifier !!');

        return redirect('achats/cmd');
    }
    public function valide($id){
        $achat = Achat::find($id);
            $achat->validation = 1;
            $achat->save();
            //recupiré le solde actuelle de l'agence
            $sold = Agence::where('id',Auth::user()->agence_id)->first();

            if($achat->machat == 'caisse'){
                $sold->caisse = $sold->caisse - ($achat->prix * $achat->qantite);
            }
            if($achat->machat == 'banque'){
                $sold->banque = $sold->banque - ($achat->prix * $achat->qantite);
            }

            //modifer le solde de la caisse ou banque
            $sold->save();
            session()->flash('success','La commande d\'achat à été validé !!');
            return redirect('achats');

    }
    public function refuse($id){
        $achat = Achat::find($id);
        $achat->validation = 2;
        $achat->save();
        session()->flash('success','La commande d\'achat à été réfusé !!');
        return redirect('achats/refus');
    }
    public function destroy(Request $request, $id){
        $commande = Achat::find($id);
        $commande->delete();
        return redirect('/achats/cmd');

    }

}
