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
        <div class="col-md-10">
            <form method="POST" action="{{ url('fornecedores/'.$fornecedor->id.'/empresa/'.$fornecedor->id_empresa.'/editar') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-7">
                        <label>Nome</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ? : $fornecedor->nome }}" required autocomplete="nome" autofocus>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cnpj">CPF/CNPJ</label>
                        <input type="text" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') ? : $fornecedor->documento}}" required autocomplete="documento" autofocus>
                        @error('documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-5">
                        <label>Empresa</label>
                        <select name="id_empresa" class="form-control @error('id_empresa') is-invalid @enderror">
                            @foreach($empresas as $empresa)
                                @if($empresa->id == $fornecedor->id_empresa)
                                    <option selected value="{{$empresa->id}}">{{$empresa->nome_fantasia}}</option>
                                @else
                                    <option value="{{$empresa->id}}">{{$empresa->nome_fantasia}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cnpj">Telefones</label>
                        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>
                        @error('cnpj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row col-sm-12">
                    <button class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
