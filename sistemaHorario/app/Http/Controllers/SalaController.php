<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return response()->json($salas);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'capacidade' => 'required|integer|min:1',
    ]);

    $sala = Sala::create($validatedData);

    return response()->json($sala, 201);
}

    public function show(Sala $sala)
    {
        return response()->json($sala);
    }

    public function update(Request $request, Sala $sala)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
        ]);
    
        $sala->update([
            'nome' => $request->nome,
            'capacidade' => $request->capacidade,
        ]);
    
        return response()->json($sala, 200);
    }
    


    public function destroy(Sala $sala)
    {
        $sala->delete();

        return response()->json(null, 204);
    }
}