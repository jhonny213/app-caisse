<?php

namespace Caisse\Http\Controllers;
use Caisse\Aliment;
use Auth;
use Caisse\User;
use Illuminate\Http\Request;

class AlimentebanqueController extends Controller
{
    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $banqueListe = Aliment::join('users', 'aliments.user_id', '=', 'users.id')->
            join('agences','users.agence_id','=','agences.id')->
            select('aliments.*', 'users.id','users.nom','users.prenom','users.agence_id',
                'agences.id','agences.name')->
            where('malimente','banque')->
            get();

        }else{
            $banqueListe = Aliment::where('user_id',Auth::user()->id)->where('malimente','banque')->get();
        }

        return view('banques.aliments.index',['aliments'=>$banqueListe]);

    }

    public function create(){

        //recupiré le solde actuelle de l'agence
        $banque = User::join('agences','users.agence_id','=','agences.id')->select('users.id','agences.banque')->where('users.id',Auth::user()->id)->get();

        return view('banques.aliments.create',['banque'=>$banque]);
    }


    public function store(Request $requeste){
        //recupiré le solde actuelle de l'agence
        $banque = User::join('agences','users.agence_id','=','agences.id')->select('users.id','agences.banque')->where('users.id',Auth::user()->id)->get();
        foreach ($banque as $val){
            $banquesold = $val['banque'];
        }


        $aliment = new Aliment();
        $aliment->malimente = 'banque';
        $aliment->old_somme = $banquesold;
        $aliment->somme = $requeste->input('fonds');
        $aliment->user_id = Auth::user()->id;

        $aliment->save();

        session()->flash('success','La banque à été bien Alimenté !!');

        return redirect('alimentebanque');

    }
}
