<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Empresa;

class EmpresasController extends Controller
{
    public function new()
    {
        $estados = Estado::all();
        return view('empresas/new', compact('estados'));
    }

    public function create(Request $request)
    {
        $empresa = new Empresa($request->all());
        $empresa->save();

        return redirect('empresas');
    }
    
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $estados = Estado::all();
        return view('empresas/edit', compact('empresa', 'estados'));
    }
    
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->fill($request->all());
        $empresa->save();
        return redirect('empresas');
    }

    public function excluir($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect('empresas');
    }
}
