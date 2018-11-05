<?php

namespace Caisse\Http\Controllers;
use Caisse\Agence;
use Caisse\Aliment;
use Auth;
use Caisse\User;
use Illuminate\Http\Request;

class AlimentecaisseController extends Controller
{
    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $caisseListe = Aliment::join('users', 'aliments.user_id', '=', 'users.id')->
            join('agences','users.agence_id','=','agences.id')->
            select('aliments.*', 'users.id','users.nom','users.prenom','users.agence_id',
                'agences.id','agences.name')->
            where('malimente','caisse')->
            get();

        }else{
            $caisseListe = Aliment::where('user_id',Auth::user()->id)->where('malimente','caisse')->get();
        }

        return view('caisses.aliments.index',['aliments'=>$caisseListe]);

    }

    public function create(){

        //recupiré le solde actuelle de l'agence
        $caisse = User::join('agences','users.agence_id','=','agences.id')->select('users.id','agences.caisse')->where('users.id',Auth::user()->id)->get();

        return view('caisses.aliments.create',['caisse'=>$caisse]);
    }

    public function store(Request $requeste){
        //recupiré le solde actuelle de l'agence
        $sold_caisse = User::join('agences','users.agence_id','=','agences.id')->
        select('users.id','agences.caisse')->
        where('users.id',Auth::user()->id)->first();


        $aliment = new Aliment();
        $aliment->malimente = 'caisse';
        $aliment->old_somme = $sold_caisse->caisse;
        $aliment->somme = $requeste->input('fonds');
        $aliment->user_id = Auth::user()->id;

        $saved = $aliment->save();
        if($saved){
            $new_somme = $requeste->input('fonds') + $sold_caisse->caisse;

            $new_sold = Agence::find($sold_caisse->id);
            $new_sold->caisse = $new_somme;

            $new_sold->save();
            session()->flash('success','La caisse à été bien Alimenté !!');
        }


        return redirect('alimentecaisse');

    }
}
