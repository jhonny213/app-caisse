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
                <form action="{{url('achats/'.$achat->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}

                    <div class="input-group row">
                        <div class="col-5"></div>
                        <div id="radioBtn" class="btn-group col-6 align-content-center">
                            <a class="btn btn-primary btn-lg @if($achat->machat == "caisse") active @else notActive  @endif " data-toggle="happy" data-title="caisse">CAISSE</a>
                            <a class="btn btn-primary btn-lg  @if($achat->machat == "banque") active @else notActive  @endif " data-toggle="happy" data-title="banque">BANQUE</a>
                        </div>
                        <input type="hidden" name="machat" id="happy" value="{{$achat->machat}}">
                        <div class="col-3"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Fournitures: </label>
                        <select name="fourniture" id="fourniture" class="form-control">
                            <option value="">Les fournitures</option>
                            @foreach($fournitures as $val)
                                <option @if($achat->fourniture_id == $val->id) selected="selected" @endif value="{{$val->id}}">{{$val->libelle}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fournisseurs: </label>
                        <select name="fournisseur" id="fournisseur" class="form-control">
                            <option>Les fournisseurs</option>
                            @foreach($fournisseur as $val)
                                <option @if($achat->fournisseur_id == $val->id) selected="selected" @endif value="{{$val->id}}">@if($val->reson_social != ""){{$val->reson_social}} @else {{$val->name}} @endif()</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group mb-3 row" id="prix">
                        <div class="input-group-prepend col-lg-6">
                            <span class="input-group-text ">Prix</span>
                            <input type="text" name="prix" id="prix" value="{{$achat->prix}}" class="form-control" aria-label="Amount (to the nearest Dinar Algerie)">
                        </div>
                        <div class="input-group-prepend col-lg-6">
                                <span class="input-group-text">Quantité</span>
                                <input type="number" min="1" name="Quantite" value="{{$achat->qantite}}" id="Quantite" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea name="desc" class="form-control">
                            {{$achat->desc}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Recommand">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
