<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_profile = Auth::id();
        $notas = Note::where('user_id', $id_profile)->get();

        return view('dashboard')->with([
            'notas' => $notas,
        ]);
    }

  
    public function create()
    {
        return view('nota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'conteudo' => 'required',
        ]);

        Note::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('dashboard')->with('success', 'Tarefa adicionada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nota = Note::find($id);
        return view('nota.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nota = Note::find($id);
        if ($nota->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para editar esta nota.');
        }

        return view('nota.edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'titulo' => 'required|max:255',
            'conteudo' => 'required',
        ]);

        $nota = Note::find($id);
        if ($nota->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para atualizar esta nota.');
        }
        $nota->update($data);
          
        return redirect()->route('dashboard')->with('success', 'Nota atualizada com sucesso!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nota = Note::find($id);
        if ($nota->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para deletar esta nota.');
        }
        $nota->delete();
        return redirect()->route('dashboard')->with('success', 'Nota removida com sucesso!');
    }
}
