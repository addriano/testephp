@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Listagem de empresas</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de empresas</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ url('empresas') }}">
                @csrf
                <div class="form-group col-sm-8 row">
                    <label>Nome</label>
                    <input type="nome_fantasia" class="form-control @error('nome_fantasia') is-invalid @enderror" name="nome_fantasia" value="{{ old('nome_fantasia') }}" required autocomplete="nome_fantasia" autofocus>
                    @error('nome_fantasia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-sm-5">
                        <label for="cnpj">CNPJ</label>
                        <input id="cnpj" type="cnpj" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>
                        @error('cnpj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="id_estado">UF</label>
                        <select name="id_estado" class="form-control @error('id_estado') is-invalid @enderror">
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                            @endforeach
                        </select>
                        @error('id_estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
