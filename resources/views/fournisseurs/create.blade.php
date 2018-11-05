@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('fournisseurs/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nom: </label>
                            <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Reson social: </label>
                        <input type="text" name="reson_social" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse: </label>
                        <input type="text" name="adr" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone: </label>
                        <input type="text" name="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email: </label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Site web: </label>
                        <input type="text" name="site" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
