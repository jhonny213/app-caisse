@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('alimentecaisse/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Solde actuel: </label>
                        @foreach($caisse as $val)
                         <input type="number" step="0.01" id="old_fonds" class="form-control" disabled="disabled" value="{{$val['caisse']}}">
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">Ajouter de nouveaux fonds: </label>
                        <input type="number" step="0.01" min="1" id ="fonds" name="fonds" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Nouvelle Solde de caisse: </label>
                        <input type="number" step="0.01" id="new_fonds" class="form-control" disabled="disabled" value="">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()