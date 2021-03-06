@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif

    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>Fournitures</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>TTC</th>
            <th>C / B</th>
            <th>Fournisseurs</th>
            @if (Auth::user()->groupe == 'Administrateur')
            <th>Utilisateurs</th>
            @endif
        </tr>
    @foreach($achats as $val)
            <tr>
                <td>{{$val->libelle}}</td>
                <td>{{$val->prix}}</td>
                <td>{{$val->qantite}}</td>
                <td>{{$val->prix * $val->qantite}}</td>
                <td>{{$val->machat}}</td>
                <td>{{$val->fornis_name}}</td>
                @if (Auth::user()->groupe == 'Administrateur')
                    <td>{{$val->username}}
                        <span> | Agence: {{$val->name}}</span>
                    </td>

                @endif
            </tr>
    @endforeach

    </table>
@endsection()
