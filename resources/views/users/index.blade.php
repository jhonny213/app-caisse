@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>Nom et prenom</th>
            <th>username</th>
            <th>Agences</th>
            <th>Groupes</th>
        </tr>
        @foreach($users as $val)
            <tr>
                <td>{{$val['nom']}} {{$val['prenom']}}</td>
                <td>{{$val['username']}}</td>
                <td>{{$val['name']}}</td>
                <td>{{$val['groupe']}}</td>
            </tr>
        @endforeach
    </table>
@endsection()

