<?php

namespace Caisse\Http\Controllers;
use Caisse\Achat;
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
            $caisseListe = Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','caisse')->
            orderBy('created_at', 'asc')->get();

            $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','caisse')
                ->orderBy('created_at', 'desc')
                ->limit(1)->first();

            $lastAchat = Achat::where('agence_id',Auth::user()->agence_id)->where('machat','caisse')

                ->orderBy('created_at', 'desc')
                ->limit(1)->first();
        }

        return view('caisses.aliments.index',['aliments'=>$caisseListe,'lastAliment'=>$lastAliment,'lastAchat'=>$lastAchat]);

    }

    public function create(){

        $caisse = Agence::where('id', Auth::user()->agence_id)->first();

        return view('caisses.aliments.create',['caisse'=>$caisse->caisse]);
    }

    public function store(Request $requeste){
        //recupiré le solde actuelle de l'agence
        $sold_caisse = Agence::where('id', Auth::user()->agence_id)->first();

        $aliment = new Aliment();
        $aliment->malimente = 'caisse';
        $aliment->old_somme = $sold_caisse->caisse;
        $aliment->somme = $requeste->input('fonds');
        $aliment->user_id = Auth::user()->id;
        $aliment->agence_id = Auth::user()->agence_id;

        $saved = $aliment->save();
        if($saved){
            $new_somme = $requeste->input('fonds') + $sold_caisse->caisse;

            $new_sold = Agence::find(Auth::user()->agence_id);
            $new_sold->caisse = $new_somme;

            $new_sold->save();
            session()->flash('success','La caisse à été bien Alimenté !!');
            return redirect('alimentecaisse');
        }
    }

    public function edit($id){
        $caisse = Agence::where('id', Auth::user()->agence_id)->first();
        $aliment = Aliment::find($id);
        return view('caisses.aliments.edit',['caisse'=>$caisse->caisse,'aliment'=>$aliment]);
    }
    public function update(Request $requeste, $id){
        $aliment =  Aliment::find($id);
        $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','caisse')
            ->orderBy('created_at', 'desc')
            ->limit(1)->first();
        if($aliment->id == $lastAliment->id){
            $aliment->somme = $requeste->input('fonds');
            $saved = $aliment->save();

            if($saved){

                $new_sold = Agence::find(Auth::user()->agence_id);
                $editSomme = $requeste->input('fonds');
                $newSome = $new_sold->caisse - $lastAliment->somme;
                $newSome += $editSomme;
                $new_sold->caisse = $newSome;

                $new_sold->save();
                session()->flash('success','La caisse à été bien Modifier !!');
                return redirect('alimentecaisse');
            }
        }else{
            session()->flash('warning','la modification à été réfusé !!');
            return redirect('alimentecaisse');
        }

    }
    public function destroy($id){

        $alimentID = Aliment::find($id);
        $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','caisse')
            ->orderBy('created_at', 'desc')
            ->limit(1)->first();
        if($alimentID->id == $lastAliment->id){
            $delet = $alimentID->delete();
            if($delet){
                $new_sold = Agence::find(Auth::user()->agence_id);

                $new_sold->caisse = $alimentID->old_somme;

                $new_sold->save();

                session()->flash('success','L\'alimentation de la  caisse à été bien Supprimer !!');
                return redirect('/alimentecaisse/');
            }

        }else{
            session()->flash('warning','la suppression a été réfusé !!');
            return redirect('alimentecaisse');
        }

    }
}
