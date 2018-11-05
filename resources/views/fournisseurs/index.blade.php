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
