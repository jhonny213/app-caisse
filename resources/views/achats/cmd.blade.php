@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    @if(session()->has('warning'))
        <div class="alert alert-warning"> {{session()->get('success')}} </div>
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
            @if (Auth::user()->groupe == 'Directeur')
                <th>Validation</th>
            @endif
            @if (Auth::user()->groupe == 'Gestionnaire')
                <th>
                    Action
                </th>
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
                @if (Auth::user()->groupe == 'Directeur')
                    <td>
                        <form method="post" action='{{url("/achats/cmd/valide/".$val->IDAchat)}}'>
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-success ">V</button>
                        </form>
                        <form method="post" action='{{url("/achats/cmd/refuse/".$val->IDAchat)}}'>
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">X</button>
                        </form>
                    </td>
                @endif
                @if (Auth::user()->groupe == 'Gestionnaire')
                    <td>
                        <a href="{{url('achats/'.$val->IDAchat.'/edit')}}" class="btn btn-info fa fa-edit float-left"> Edit</a>
                        <form method="post" action='{{url("achats/".$val->IDAchat)}}'>
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning fa fa-remove" style="margin-left: 5px;"> Supprimer</button>
                        </form>
                    </td>
                @endif
            </tr>
    @endforeach

    </table>
@endsection()
