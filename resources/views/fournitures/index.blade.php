@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif

    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>libelle Fournitures</th>
            <th>Descriptions</th>
        </tr>
        @if(!empty($fournitures))
            @foreach($fournitures as $val)
            <tr>
                <td>{{$val['libelle']}}</td>
                <td>{{$val['desc']}}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td>NULL</td>
                <td>NULL</td>
            </tr>
        @endif
    </table>
@endsection()
