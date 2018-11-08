@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>Nom & Prenom</th>
            <th>reson social</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Site</th>
            @if(Auth::user()->groupe == 'Administrateur')
                <th>Agences</th>
            @endif
            <th>Restorer</th>
        </tr>
    @if(!empty($fournisseurs))
        @foreach($fournisseurs as $val)
            <tr>
                <td>{{$val['name']}}</td>
                <td>{{$val['reson_social']}}</td>
                <td>{{$val['adresse']}}</td>
                <td>{{$val['tel']}}</td>
                <td>{{$val['email']}}</td>
                <td>{{$val['site_web']}}</td>
                @if(Auth::user()->groupe == 'Administrateur')
                    <th>{{$val['NameAgence']}}</th>
                @endif
                <td>
                   <form method="post" action='{{url("/fournisseurs/blocke/".$val->IDfournisseur)}}'>
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-warning fa fa-recycle" style="margin-left: 5px;" title="Blocké"> </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
            <tr>
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
                <td>NULL</td>
            </tr>
    @endif
    </table>

@endsection()
