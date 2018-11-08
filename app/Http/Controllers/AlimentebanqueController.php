<?php

namespace Caisse\Http\Controllers;
use Caisse\Aliment;
use Auth;
use Caisse\User;
use Caisse\Agence;
use Illuminate\Http\Request;
use Caisse\Achat;
class AlimentebanqueController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        if(Auth::user()->groupe == 'Administrateur'){
            $banqueListe = Aliment::join('users', 'aliments.user_id', '=', 'users.id')->
            join('agences','users.agence_id','=','agences.id')->
            select('aliments.*', 'users.id','users.nom','users.prenom','users.agence_id',
                'agences.id','agences.name')->
            where('malimente','banque')->
            get();

        }else{
            $banqueListe = Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','banque')
            ->orderBy('created_at', 'asc')->get();

            $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','banque')
                ->orderBy('created_at', 'desc')
                ->limit(1)->first();

            $lastAchat = Achat::where('agence_id',Auth::user()->agence_id)->where('machat','banque')

                ->orderBy('created_at', 'desc')
                ->limit(1)->first();
        }

        return view('banques.aliments.index',['aliments'=>$banqueListe,'lastAliment'=>$lastAliment,'lastAchat'=>$lastAchat]);

    }

    public function create(){

        //recupiré le solde actuelle de l'agence
        $banque = Agence::where('id', Auth::user()->agence_id)->first();

        return view('banques.aliments.create',['banque'=>$banque->banque]);
    }


    public function store(Request $requeste){
        //recupiré le solde actuelle de l'agence
        $sold_banque = Agence::where('id', Auth::user()->agence_id)->first();

        $aliment = new Aliment();
        $aliment->malimente = 'banque';
        $aliment->old_somme = $sold_banque->banque;
        $aliment->somme = $requeste->input('fonds');
        $aliment->user_id = Auth::user()->id;
        $aliment->agence_id = Auth::user()->agence_id;

        $saved = $aliment->save();
        if($saved){
            $new_somme = $requeste->input('fonds') + $sold_banque->banque;

            $new_sold = Agence::find(Auth::user()->agence_id);
            $new_sold->banque = $new_somme;

            $new_sold->save();
            session()->flash('success','La caisse à été bien Alimenté !!');
            return redirect('alimentebanque');
        }
    }

    public function edit($id){
        $banque= Agence::where('id', Auth::user()->agence_id)->first();
        $aliment = Aliment::find($id);
        return view('banques.aliments.edit',['banque'=>$banque->banque,'aliment'=>$aliment]);
    }
    public function update(Request $requeste, $id){
        $aliment =  Aliment::find($id);
        $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','banque')
            ->orderBy('created_at', 'desc')
            ->limit(1)->first();
        if($aliment->id == $lastAliment->id){
            $aliment->somme = $requeste->input('fonds');
            $saved = $aliment->save();

            if($saved){
                $new_sold = Agence::find(Auth::user()->agence_id);
                $editSomme = $requeste->input('fonds');
                $newSome = $new_sold->banque - $lastAliment->somme;
                $newSome += $editSomme;
                $new_sold->banque = $newSome;

                $new_sold->save();
                session()->flash('success','La banque à été bien Modifier !!');
                return redirect('alimentebanque');
            }
        }else{
            session()->flash('warning','la modification à été réfusé !!');
            return redirect('alimentebanque');
        }

    }
    public function destroy($id){

        $alimentID = Aliment::find($id);
        $lastAliment =  Aliment::where('agence_id',Auth::user()->agence_id)->where('malimente','banque')
            ->orderBy('created_at', 'desc')
            ->limit(1)->first();
        if($alimentID->id == $lastAliment->id){
            $delet = $alimentID->delete();
            if($delet){
                $new_sold = Agence::find(Auth::user()->agence_id);

                $new_sold->banque = $alimentID->old_somme;

                $new_sold->save();

                session()->flash('success','L\'alimentation de la  banques à été bien Supprimer !!');
                return redirect('/alimentebanque/');
            }

        }else{
            session()->flash('warning','la suppression a été réfusé !!');
            return redirect('alimentebanque');
        }

    }
}
