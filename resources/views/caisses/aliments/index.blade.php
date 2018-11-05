@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    <div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>la somme recent</th>
                <th>nouvelle somme</th>
                <th>Solde</th>
                @if (Auth::user()->groupe == 'Administrateur')
                <th>Agence</th>
                <th>Utilisateur</th>
                @endif
                <th>Date d'alimentation</th>
            </tr>
            @foreach($aliments as $val)
                <tr>
                    <td>{{$val->old_somme}}</td>
                    <td>{{$val->somme}}</td>
                    <td>{{$val->old_somme + $val->somme}}</td>
                    @if (Auth::user()->groupe == 'Administrateur')
                    <td>{{$val->name}}</td>
                    <td>{{$val->nom}} {{$val->prenom}}</td>
                    @endif
                    <td>{{$val->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection()