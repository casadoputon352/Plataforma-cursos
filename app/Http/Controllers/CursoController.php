<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function show($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return abort(404, 'Curso não encontrado');
        }
        $estaInscrito = $curso->estaInscrito();

        return view('cursos.show', compact('curso', 'estaInscrito'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'instrutor' => 'required|string|max:255',
            'carga_horaria' => 'required|integer',
            'preco' => 'required|numeric',
            'descricao' => 'required|string',
            'categoria' => 'required|string|max:255',
            'avaliacoes' => 'required|numeric',
            'pre_requisitos' => 'required|string',
            'video_url' => 'required|string',

        ]);

        // $va = Validator::make($request->all(), [
        //     'titulo' => 'required|string|max:255',
        //     'instrutor' => 'required|string|max:255',
        //     'carga_horaria' => 'required|integer',
        //     'preco' => 'required|numeric',
        //     'descricao' => 'required|string',
        //     'categoria' => 'required|string|max:255',
        //     'avaliacoes' => 'required|numeric',
        //     'video_url' => 'required|string',
        //     'pre_requisitos' => 'required|string',


        // ]);
        // Criação do curso
        Curso::create([
            'titulo' => $request->titulo,
            'instrutor' => $request->instrutor,
            'carga_horaria' => $request->carga_horaria,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'avaliacoes' => $request->avaliacoes,
            'video_url' => $request->video_url,
            'pre_requisitos' => $request->pre_requisitos,


        ]);

        return redirect('/cursos')->with('success', 'Curso criado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        // Exclui o curso
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);

        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return abort(404, 'Curso não encontrado');
        }
        $request->validate([
            'categoria' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'carga_horaria' => 'required',
            'instrutor' => 'required',
            'preco' => 'required',
        ]);

        // Atualize os atributos do curso com base nos dados do formulário
        $curso->categoria = $request->input('categoria');
        $curso->titulo = $request->input('titulo');
        $curso->descricao = $request->input('descricao');
        $curso->carga_horaria = $request->input('carga_horaria');
        $curso->instrutor = $request->input('instrutor');
        $curso->preco = $request->input('preco');

        // Salve as alterações no banco de dados
        $curso->save();
        // Redirecione para a página de visualização do curso ou para onde preferir
        return redirect()->route('cursos.show', $curso->id)->with('success', 'Curso atualizado com sucesso');
    }
}
