@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>Agenece</th>
            <th>Wilaya</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Banque</th>
            <th>Caisse</th>
        </tr>
            @foreach($agences as $val)
                @if($val['name'] != "Direction Général")
                    <tr>
                        <td>{{$val['name']}}</td>
                        <td>{{$val['wilaya']}}</td>
                        <td>{{$val['adresse']}}</td>
                        <td>{{$val['tel']}}</td>
                        <td>{{$val['banque']}}</td>
                        <td>{{$val['caisse']}}</td>
                    </tr>
            @endif
            @endforeach
    </table>
@endsection()
