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
                        <label for="patientInput" class="form-label">Seleccione un paciente*</label>
                        <select name="patient_id" id="patientInput" class="form-select" required>
                            <option selected disabled value="">---</option>
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
                            <option selected value="">---</option>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->first_name}} {{ $doctor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="tests-collection">
                        <label for="medicalTestInput-0">Seleccione Tests*</label>
                        <div class="input-group mb-1" id="model-input-test-0" data-index='0'>
                            <select name="medical_test_id" id="medicalTestInput-0" class="form-select" required>
                                <option selected value="" disabled>---</option>
                                @foreach ($medicalTests as $medicalTest)
                                <option value="{{ $medicalTest->id }}">{{ $medicalTest->name}}</option>
                                @endforeach
                            </select>
                            <button data-id-remove='model-input-test-0' class="btn btn-outline-secondary" type="button"
                                title="Eliminar" disabled>
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="invalid-feedback">Por favor seleccione al menos un test</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" id="add-test-button">
                            <i class="fa fa-add"></i>
                            Añadir otro test
                        </button>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <div>
                    <span class="fw-bold">Precio:</span>
                    <span id='price'>0.00</span>
                    <span>soles</span>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="add-order-form" class="btn btn-teal" id="add-order-submit-button">Save
                        orden</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- TODO: Look for alternatives --}}
<script>
    window.medicalTests = {!! $medicalTests !!}
</script>