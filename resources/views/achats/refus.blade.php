@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif

    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>Fournitures</th>
            <th>Prix</th>
            <th>C / B</th>
            <th>Fournisseurs</th>
            @if (Auth::user()->groupe == 'Administrateur')
            <th>Utilisateurs</th>
            @endif
            @if (Auth::user()->groupe == 'Directeur')
                <th>Validation</th>
            @endif
            @if (Auth::user()->groupe == 'Gestionnaire')
                <th>
                    Modifier
                </th>
            @endif
        </tr>
    @foreach($achats as $val)
            <tr>
                <td>{{$val->libelle}}</td>
                <td>{{$val->prix}}</td>
                <td>{{$val->machat}}</td>
                <td>{{$val->fornis_name}}</td>
                @if (Auth::user()->groupe == 'Administrateur')
                    <td>{{$val->username}}
                        <span> | Agence: {{$val->name}}</span>
                    </td>

                @endif
                @if (Auth::user()->groupe == 'Directeur')
                    <td>
                        <button type="button" class="btn btn-success">V</button>
                        <button type="button" class="btn btn-danger">X</button>
                    </td>
                @endif
                @if (Auth::user()->groupe == 'Gestionnaire')
                    <td>
                        <a href="{{url('achats/'.$val->id.'/edit')}}" class="btn btn-info fa fa-edit"> Recommander</a>
                        <a href="{{url('achats/'.$val->id.'/edit')}}" class="btn btn-warning fa fa-remove"> Supprimer</a>
                    </td>
                @endif
            </tr>
    @endforeach

    </table>
@endsection()
