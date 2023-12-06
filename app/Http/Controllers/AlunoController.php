<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class AlunoController extends Controller
{
    public function index()
    {
        $alunos = User::all();
        return view('admin.alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('admin.alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function show(User $aluno)
    {
        return view('admin.alunos.show', compact('aluno'));
    }

    public function edit(User $aluno)
    {
        return view('admin.alunos.edit', compact('aluno'));
    }

    public function update(Request $request, User $aluno)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $aluno->id,
            // Adicione outras validações conforme necessário
        ]);

        // Atualização do aluno
        $aluno->update($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(User $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }
}
