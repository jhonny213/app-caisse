@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="alert" class="col-12">

        </div>
        @if(count($errors))
            <div  class="col-12 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('achats/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-group row">
                        <div class="col-5"></div>
                        <div id="radioBtn" class="btn-group col-6 align-content-center">
                            <a class="btn btn-primary btn-lg active" data-toggle="happy" data-title="caisse">CAISSE</a>
                            <a class="btn btn-primary btn-lg notActive" data-toggle="happy" data-title="banque">BANQUE</a>
                        </div>
                        <input type="hidden" name="machat" id="happy" value="caisse">
                        <div class="col-3"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Fournitures: </label>
                        <select name="fourniture" id="fourniture" class="form-control">
                            <option value="">Les fournitures</option>
                            @foreach($fournitures as $val)
                                <option value="{{$val->id}}">{{$val->libelle}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fournisseurs: </label>
                        <select name="fournisseur" id="fournisseur" class="form-control">
                            <option>Les fournisseurs</option>
                            @foreach($fournisseur as $val)
                                <option value="{{$val->id}}">@if($val->reson_social != ""){{$val->reson_social}} @else {{$val->name}} @endif()</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group mb-3" id="prix">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Prix</span>
                            <span class="input-group-text">DA</span>
                            <input type="text" name="prix" id="prix" class="form-control" aria-label="Amount (to the nearest Dinar Algerie)">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea name="desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
