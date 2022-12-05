<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Paciente;

class PacientesController extends Controller
{
    public function store (Request $request) {
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
        ]);

        $paciente = new Paciente;
        $paciente->name = $request->name;
        $paciente->lastname = $request->lastname;
        $paciente->save();

        return response($paciente, 201);
    }

    public function index () {
        $pacientes = Paciente::all();

        return response($pacientes, 200);
    }

    public function show ($id) {
        $paciente = Paciente::find($id);

        return response($paciente, 200);
    }

    public function update (Request $request, $id) {
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
        ]);

        $paciente = Paciente::find($id);

        if (!$paciente) return response('El paciente no existe', 400);

        if ($request->name) $paciente->name = $request->name;
        if ($request->lastname) $paciente->lastname = $request->lastname;
        $paciente->save();

        return response($paciente, 200);
    }

    public function destroy ($id) {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return response('Paciente eliminado con éxito', 200);
    }
  }
