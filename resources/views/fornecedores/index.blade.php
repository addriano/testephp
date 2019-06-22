@extends('layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Listagem de empresas</li>
    <a href="{{url('fornecedores/empresa').($id ? '/'.$id.'/novo' : 'novo') }}" class="btn btn-primary bt-novo">Novo</a>
</ol>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">telefones</th>
                    <th scope="col">Data/Hora cadastro</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $i => $forn)
                        <tr>
                            <td>{{ $forn->nome }}</td>
                            <td>{{ $forn->empresa->nome_fantasia }}</td>
                            <td>{{ $forn->documento }}</td>
                            <td>
                                @foreach($forn->telefones as $fone)
                                    <div>{{$fone->numero}}</div>
                                @endforeach
                            </td>
                            <td>{{ date_format($forn->created_at, "d/m/Y H:i:s") }}</td>
                            <td>
                                <a class="btn btn-success" href="#">Editar</a>
                                <a class="btn btn-info" href="#">Fornecedores</a>
                                <a class="btn btn-danger" href="#">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
