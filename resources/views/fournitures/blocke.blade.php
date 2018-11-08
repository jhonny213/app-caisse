@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success"> {{session()->get('success')}} </div>
    @endif

    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <th>libelle Fournitures</th>
            <th>Descriptions</th>
            @if(Auth::user()->groupe == 'Administrateur')
                <th>Agences</th>
            @endif
            <th>Restorer</th>
        </tr>
        @if(!empty($fournitures))
            @foreach($fournitures as $val)
            <tr>
                <td>{{$val['libelle']}}</td>
                <td>{{$val['desc']}}</td>
                @if(Auth::user()->groupe == 'Administrateur')
                    <th>{{$val['NameAgence']}}</th>
                @endif
                <td>
                    <form method="post" action='{{url("fournitures/blocke/".$val->IDfourniture)}}'>
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
            </tr>
        @endif
    </table>
@endsection()
