<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function create($cursoId)
    {
        // Exibir formulário de inscrição
        $curso = Curso::findOrFail($cursoId);
        return view('inscricoes.create', compact('curso'));
    }

    public function store(Request $request, $cursoId)
    {
        // Validar e salvar inscrição
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'forma_pagamento' => 'required|string',
        ]);
        $userId = auth()->user()->id;

        Inscricao::create([
            'curso_id' => $cursoId,
            'user_id' => $userId,
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'forma_pagamento' => $request->input('forma_pagamento'),
        ]);

        return redirect()->route('cursos.show', $cursoId)->with('success', 'Inscrição realizada com sucesso!');
    }
}
