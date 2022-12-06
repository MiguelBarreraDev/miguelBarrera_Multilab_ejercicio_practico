<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{
    /**
     * Creado un nuevo patient.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'firt_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
        ], [
            'firt_name.required' => ':attribute is requerid',
            'last_name.required' => ':attribute is requerid',
            'birth_date.required' => ':attribute is requerid',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $patient = new Patient;
        $patient->firt_name = $request->firt_name;
        $patient->last_name = $request->last_name;
        $patient->save();

        return response($patient, 201);
    }

    /**
     * Listando patients.
     *
     * @return Response
     */
    public function index () {
        $patients = Patient::all();
        if (!$patients) return response([], 200);
    
        return response($patients, 200);
    }

    /**
     * Mostrar un patient.
     *
     * @param int $id
     * @return Response
     */
    public function show ($id) {
        $patient = Patient::find($id);
        if (!isset($patient)) return response(null, 404);

        return response($patient, 200);
    }

    /**
     * Actualiza un patient.
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'firt_name' => 'min:2',
            'last_name' => 'min:2',
        ], [
            'firt_name.min' => 'The :attribute must have at least :min character',
            'last_name.min' => 'The :attribute must have at least :min character'
        ]);

        $patient = Patient::find($id);

        if (!isset($patient)) return response(null, 404);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        if ($request->firt_name) $patient->firt_name = $request->firt_name;
        if ($request->last_name) $patient->last_name = $request->last_name;
        if ($request->birth_date) $patient->birth_date = $request->birth_date;
        if ($request->phone_number) $patient->phone_number = $request->phone_number;
        if ($request->email) $patient->email = $request->email;

        $patient->save();

        return response(null, 204);
    }

    /**
     * Eliminar un patient.
     *
     * @param int $id
     * @return Response
     */
    public function destroy ($id) {
        $patient = Patient::find($id);

        if (!isset($patient)) return response(null, 404);
        
        $patient->delete();

        return response(null, 204);
    }
}