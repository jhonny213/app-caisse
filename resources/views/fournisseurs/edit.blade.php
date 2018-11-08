@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <form action="{{url('fournisseurs/'.$fournisseur->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nom: </label>
                        <input type="text" name="nom" class="form-control" value="{{$fournisseur->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Reson social: </label>
                        <input type="text" name="reson_social" class="form-control" value="{{$fournisseur->reson_social}}">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse: </label>
                        <input type="text" name="adr" class="form-control" value="{{$fournisseur->adresse}}">
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone: </label>
                        <input type="text" name="tel" class="form-control" value="{{$fournisseur->tel}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email: </label>
                        <input type="text" name="email" class="form-control" value="{{$fournisseur->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Site web: </label>
                        <input type="text" name="site" class="form-control" value="{{$fournisseur->site_web}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()

