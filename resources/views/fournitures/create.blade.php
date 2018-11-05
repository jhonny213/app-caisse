@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('fournitures/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Fourniture: </label>
                            <input type="text" name="libelle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
