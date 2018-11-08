@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="alert" class="col-md-12"></div>
            <div class="col-md-12">

                <form action="{{url('alimentecaisse/'.$aliment->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Solde avent l'alimentation: </label>

                         <input type="number" step="0.01" id="old_fonds-edit" class="form-control" disabled="disabled" value="{{$aliment->old_somme}}">

                    </div>

                    <div class="form-group">
                        <label for="">Ajouter de nouveaux fonds-edit: </label>
                        <input type="number" step="0.01" min="1" id ="fonds-edit" name="fonds" class="form-control" value="{{$aliment->somme}}">
                    </div>

                    <div class="form-group">
                        <label for="">Nouvelle Solde de caisse: </label>
                        <input type="number" step="0.01" id="new_fonds-edit" class="form-control" disabled="disabled" value="">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
