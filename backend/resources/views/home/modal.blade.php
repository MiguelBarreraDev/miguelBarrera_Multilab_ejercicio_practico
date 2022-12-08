<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold " id="staticBackdropLabel">Añadir nueva orden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/orders')}}" method="POST" id="add-order-form" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="patientInput" class="form-label">Seleccione un paciente</label>
                        <select name="patient_id" id="patientInput" class="form-select" required>
                            <option selected disabled value="">...</option>
                            @foreach ($patients as $patient)
                            <option value="{{ $patient->id}}">{{ $patient->first_name}} {{ $patient->last_name}}
                            </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un paciente</div>
                    </div>
                    <div class="mb-3">
                        <label for="doctorInput">Seleccione un doctor</label>
                        <select name="doctor_id" id="doctorInput" class="form-select">
                            <option selected disabled value="">...</option>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id}}">{{ $doctor->first_name}} {{ $doctor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="add-order-form" class="btn btn-teal" id="add-order-submit-button">Save
                    orden</button>
            </div>
        </div>
    </div>
</div>