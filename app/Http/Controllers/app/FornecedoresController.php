<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Fornecedores;

class FornecedoresController extends Controller
{
    public function index($id = null)
    {
        if($id) {
            $fornecedores = Fornecedores::where('id_empresa', '=', $id)
                ->with('telefones', 'empresa')
                ->get();
        }else{
            $fornecedores = Fornecedores::with('telefones', 'empresa')
            ->get();
        }
        return view('fornecedores.index', compact('id', 'fornecedores'));
    }

    public function new($id = null)
    {
        $empresas = Empresa::all();
        return view('fornecedores.new', compact('id', 'empresas'));
    }

    public function create(Request $request, $id = null)
    {
        $fornecedor = new Fornecedores($request->all());
        $fornecedor->save();
        return redirect('fornecedores/empresa/'.$id);
    }

    public function edit($idForn, $idEmpresa)
    {
        $fornecedor = Fornecedores::find($idForn);
        $empresas = Empresa::all();
        return view('fornecedores.edit', compact('fornecedor', 'empresas'));
    }

    public function update(Request $request, $idForn, $idEmpresa){
        $fornecedor = Fornecedores::find($idForn);
        $fornecedor->fill($request->all());
        $fornecedor->save();
        return redirect('fornecedores/empresa/'.$idEmpresa);

    }
}
