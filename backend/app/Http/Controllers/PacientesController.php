<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;

class PacientesController extends Controller
{
    /**
     * Creado un nuevo paciente.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
        ], [
            'name.required' => 'Name is requerid',
            'name.min' => 'The :attribute must have at least :min character',
            'lastname.required' => 'Name is requerid',
            'lastname.min' => 'The :attribute must have at least :min character'
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $paciente = new Paciente;
        $paciente->name = $request->name;
        $paciente->lastname = $request->lastname;
        $paciente->save();

        return response($paciente, 201);
    }

    /**
     * Listando pacientes.
     *
     * @return Response
     */
    public function index () {
        $pacientes = Paciente::all();
        if (!$pacientes) return response([], 200);
    
        return response($pacientes, 200);
    }

    /**
     * Mostrar un paciente.
     *
     * @param int $id
     * @return Response
     */
    public function show ($id) {
        $paciente = Paciente::find($id);
        if (!isset($paciente)) return response(null, 404);

        return response($paciente, 200);
    }

    /**
     * Actualiza un paciente.
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'min:2',
            'lastname' => 'min:2',
        ], [
            'name.min' => 'The :attribute must have at least :min character',
            'lastname.min' => 'The :attribute must have at least :min character'
        ]);

        $paciente = Paciente::find($id);

        if (!isset($paciente)) return response(null, 404);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        if ($request->name) $paciente->name = $request->name;
        if ($request->lastname) $paciente->lastname = $request->lastname;

        $paciente->save();

        return response(null, 204);
    }

    /**
     * Eliminar un paciente.
     *
     * @param int $id
     * @return Response
     */
    public function destroy ($id) {
        $paciente = Paciente::find($id);

        if (!isset($paciente)) return response(null, 404);
        
        $paciente->delete();

        return response(null, 204);
    }
}