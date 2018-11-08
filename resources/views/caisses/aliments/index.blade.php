@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    @if(session()->has('warning'))
        <div class="alert alert-warning"> {{session()->get('warning')}} </div>
    @endif
    <div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>la somme recent</th>
                <th>nouvelle somme</th>
                <th>Total Alimenté</th>
                @if (Auth::user()->groupe == 'Administrateur')
                <th>Agence</th>
                <th>Utilisateur</th>
                @endif
                <th>Date d'alimentation</th>
                @if (Auth::user()->groupe == 'Gestionnaire')
                <th>Action</th>
                @endif
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
                    @if (Auth::user()->groupe == 'Gestionnaire')
                    <td>
                        @if($lastAliment->id == $val->id && $val->created_at >  $lastAchat['created_at'])
                        <form method="post" action='{{url("/alimentecaisse/".$val->id)}}'>
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{url('/alimentecaisse/'.$val->id.'/edit')}}" class="btn btn-info fa fa-edit float-left" title="Modifier"> </a>
                            <button type="submit" class="btn btn-warning fa fa-remove" style="margin-left: 5px;" title="Blocké"> </button>
                        </form>
                            @else
                            <span class="alert alert-warning" style="padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px;">
                                Alimentation clôturer
                            </span>
                        @endif
                    </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection()