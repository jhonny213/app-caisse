@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('fournitures/'.$fourniture->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Fourniture: </label>
                        <input type="text" name="libelle" class="form-control" value="{{$fourniture->libelle}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea name="description" class="form-control">{{$fourniture->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()

