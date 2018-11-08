<?php

namespace Caisse\Http\Controllers;

use Caisse\Achat;
use Caisse\Agence;
use Caisse\Arrete;
use Auth;
use Caisse\User;
use Illuminate\Http\Request;
use Caisse\Http\Requests\ArreteRequest;
class ArretecaisseController extends Controller
{
    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $caisseListe = Arrete::join('users', 'arretes.user_id', '=', 'users.id')->
            join('agences','users.agence_id','=','agence.name')->
            select('arretes.*', 'users.id','users.nom','users.prenom','users.agence_id',
                'agence.name','agences.name')->
            get();

        }elseif(Auth::user()->groupe == 'Directeur'){
            $caisseListe = Arrete::where('agence_id',Auth::user()->agence_id)->get();
        }elseif(Auth::user()->groupe == 'Gestionnaire'){
            $caisseListe = Arrete::where('user_id',Auth::user()->id)->get();
        }
        return view('caisses.arretes.index',['arretes'=>$caisseListe]);

    }
    public function show(){

    }

    public function create(){
        $sold_caisse = Agence::where('id',Auth::user()->agence_id)->select('caisse')->first();
        return view('caisses.arretes.create',['sold_caisse'=>$sold_caisse->caisse]);
    }

    public function store(ArreteRequest $requeste){


        $arrete = new Arrete();
        $arrete['user_id'] = Auth::user()->id;
        $arrete['agence_id'] = Auth::user()->agence_id;
        $arrete['1_da'] = $requeste->input('1da');
        $arrete['2_da'] = $requeste->input('2da') * 2;
        $arrete['5_da'] = $requeste->input('5da') * 5;
        $arrete['10_da'] = $requeste->input('10da') * 10;
        $arrete['20_da'] = $requeste->input('20da') * 20;
        $arrete['50_da'] = $requeste->input('50da') * 50;
        $arrete['100_da'] = $requeste->input('100da') * 100;
        $arrete['200_da'] = $requeste->input('200da') * 200;
        $arrete['500_da'] = $requeste->input('500da') * 500;
        $arrete['1000_da'] = $requeste->input('1000da') * 1000;
        $arrete['2000_da'] = $requeste->input('2000da') * 2000;
        $arrete['sold_caisse'] = $requeste->input('sold_Brouillard');


        $arrete->save();

        session()->flash('success','La caisse à été bien Arreté !!');

        return redirect('arretecaisse');
    }
}
