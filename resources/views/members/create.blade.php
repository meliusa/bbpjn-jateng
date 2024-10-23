@extends('layouts.app')
@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="py-3">
        <span class="text-muted fw-light">Gates / Add Data / </span> Form
    </h4>
    <a href="{{ route('gates.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form class="card-body" method="POST" action="{{ route('gates.store') }}" enctype="multipart/form-data">
        @csrf
        <h6>1. Gate Information</h6>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_code" name="gate_code" class="form-control" placeholder="Gate Code" required />
                    <label for="gate_code">Gate Code</label>
                    @error('gate_code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_number" name="gate_number" class="form-control" placeholder="Gate Number" required />
                    <label for="gate_number">Gate Number</label>
                    @error('gate_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="door_number" name="door_number" class="form-control" placeholder="Door Number" required />
                    <label for="door_number">Door Number</label>
                    @error('door_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="pt-4 text-end">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
    </form>
</div>
@endsection
