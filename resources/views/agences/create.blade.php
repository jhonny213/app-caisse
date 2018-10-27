@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="form-group">
                        <label for="">Nom: </label>
                            <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Wilaya: </label>
                        <input type="text" name="wilaya" class="form-control">
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
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()