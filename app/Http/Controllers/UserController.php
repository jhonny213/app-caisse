<?php

namespace Caisse\Http\Controllers;

use Caisse\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Caisse\Agence;


class UserController extends Controller
{
    public function __construct(){

    }
    //lister utilisateurs
    public function index(){
        $listUsers = User::all();
        return view('users.index',['users' => $listUsers]);
    }
    //affiche le formumair de cration d'utilisateur
    public function create(){
        $listAgence = Agence::select('agences.id','agences.name')->where('agences.id','!=',1)->get();
        return view('users.create',['agencelist'=>$listAgence]);
    }

    public function store(Request $requeste){
        $user = new User();
        $user->nom = $requeste->input('nom');
        $user->prenom = $requeste->input('prenom');
        $user->username = $requeste->input('nom').'.'.$requeste->input('prenom');
        $user->groupe = $requeste->input('groupe');
        $user->password = Hash::make($requeste->input('password'));
        $user->agence_id = $requeste->input('agence');

        $user->save();

        session()->flash('success','L\'utilisateur à été bien enregestré !!');

        return redirect('utilisateurs');
    }
}
