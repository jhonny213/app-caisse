@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    <div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>Date d'arrete</th>
                <th>Solde Brouillard</th>
                <th>Solde Physique</th>
                <th>Solde Posétif</th>
                @if (Auth::user()->groupe == 'Administrateur')
                    <th>Agence</th>
                    <th>Utilisateur</th>
                @endif
                <th>Detail</th>
            </tr>
            @foreach($arretes as $val)
                <tr>
                    <td>{{$val['created_at']}}</td>
                    <td>{{$val->sold_caisse}}</td>
                    <td>{{$val['1_da'] + $val['2_da'] + $val['5_da'] + $val['10_da'] + $val['20_da'] + $val['50_da'] + $val['100_da'] + $val['200_da'] + $val['500_da'] + $val['1000_da'] + $val['2000_da']}}</td>
                    <td>{{$val['1_da'] + $val['2_da'] + $val['5_da'] + $val['10_da'] + $val['20_da'] + $val['50_da'] + $val['100_da'] + $val['200_da'] + $val['500_da'] + $val['1000_da'] + $val['2000_da'] -$val->sold_caisse}}</td>

                    @if (Auth::user()->groupe == 'Administrateur')
                        <td>{{$val['name']}}</td>
                        <td>{{$val['nom']}} {{$val['prenom']}}</td>
                    @endif
                    <td><a href="/arretecaisse/show"></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection()