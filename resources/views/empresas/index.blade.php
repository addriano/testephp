@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Listagem de empresas</li>
    <a href="empresas/novo" class="btn btn-primary bt-novo">Novo</a>
</ol>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->nome_fantasia}}</td>
                            <td>{{$empresa->cnpj}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('empresas/editar/'.$empresa->id)}}">Editar</a>
                                <a class="btn btn-info" href="{{url('fornecedores/empresa/'.$empresa->id)}}">Fornecedores</a>
                                <a class="btn btn-danger" href="{{url('empresas/excluir/'.$empresa->id)}}">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
