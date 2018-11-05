@extends('layouts.app')

@section('content')
    <div class="container" id="arrete">
        <div class="row">
            @if(count($errors))
                <div  class="col-12 alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div id="alert" class="col-12">

            </div>
            <div class="col-md-12">
                <form action="{{url('arretecaisse/store')}}" method="post">
                    {{csrf_field()}}
                    <div class=" row">
                        <div class="col-2">
                            Nombre de 1 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 2 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 5 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">
                        <input  type="text"   id ="1da" name="1da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_1"   disabled="disabled" class="form-control montant " value="">
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="2da" name="2da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_2"   disabled="disabled" class="form-control montant " value="">
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="5da" name="5da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_5"   disabled="disabled" class="form-control montant " value="">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-2">
                            Nombre de 10 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 20 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 50 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">
                            <input  type="text"   id ="10da" name="10da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"      id ="m_10"   disabled="disabled" class="form-control montant " value="">
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="20da" name="20da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_20"   disabled="disabled" class="form-control montant " value="">
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="50da" name="50da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_50"   disabled="disabled" class="form-control montant " value="">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-2">
                            Nombre de 100 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 200 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 500 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">
                            <input  type="text"   id ="100da" name="100da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_100"   disabled="disabled" class="form-control montant " >
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="200da" name="200da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_200"   disabled="disabled" class="form-control montant ">
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="500da" name="500da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_500"   disabled="disabled" class="form-control montant ">
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-2">
                            Nombre de 1000 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            Nombre de 2000 DA
                        </div>
                        <div class="col-2">
                            Montant
                        </div>
                        <div class="col-2">
                            <h5>Solde Physique</h5>
                        </div>
                        <div class="col-2">
                            <h5>Solde Brouillard</h5>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-2">
                            <input  type="text"   id ="1000da" name="1000da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_1000"   disabled="disabled" class="form-control montant " value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="2000da" name="2000da" class="form-control" value="" >
                        </div>
                        <div class="col-2">
                            <input  type="text"     id ="m_2000"   disabled="disabled" class="form-control montant " >
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="sold_Physique"   disabled="disabled" class="form-control montant " >
                        </div>
                        <div class="col-2">
                            <input  type="text"   id ="sold_Brouillard" value="{{$sold_caisse}}"    disabled="disabled" class="form-control montant " >
                            <input name="sold_Brouillard" value="{{$sold_caisse}}"  type="hidden" />
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-5">

                        </div>
                        <div class="col-4">
                            <h5>Solde Posétif</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">

                        </div>
                        <div class="col-8">
                            <input  type="text"   id ="sold_posetif"   disabled="disabled" class="form-control montant " >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2">

                        </div>
                        <div class="col-8">
                            <input type="submit" class="form-control btn btn-primary" value="Enregestrer">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()