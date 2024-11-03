@extends('layouts.app')
@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="py-3">
        <span class="text-muted fw-light">Gates / Edit Data / </span> Form
    </h4>
    <a href="{{ route('gates.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form id="editGateForm" class="card-body" enctype="multipart/form-data">
        <h6>1. Gate Information</h6>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_code" class="form-control" placeholder="Gate Code" value="{{ $gate->gate_code }}" required />
                    <label for="gate_code">Gate Code</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_number" class="form-control" placeholder="Gate Number" value="{{ $gate->gate_number }}" required />
                    <label for="gate_number">Gate Number</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="door_number" class="form-control" placeholder="Door Number" value="{{ $gate->door_number }}" required />
                    <label for="door_number">Door Number</label>
                </div>
            </div>
        </div>
        <input type="hidden" id="gate_id" value="{{ $gate->id }}" />
        <div class="pt-4 text-end">
            <button type="submit" class="btn btn-warning me-sm-3 me-1">Update</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
    </form>
</div>
@endsection

@section('custom-js')
<script>
    "use strict";

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const gateId = document.getElementById('gate_id').value;

    // Handle form submission for editing gate
    $('#editGateForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const updatedData = {
            gate_code: $('#gate_code').val(),
            gate_number: $('#gate_number').val(),
            door_number: $('#door_number').val(),
        };

        $.ajax({
            url: '/gates/' + gateId,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: updatedData,
            success: function(result) {
                alert("Gate updated successfully.");
                window.location.href = '{{ route("gates.index") }}'; // Redirect after success
            },
            error: function(xhr) {
                alert("Error updating gate: " + xhr.responseText);
            }
        });
    });
</script>
@endsection
