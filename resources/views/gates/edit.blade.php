@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Gates / Edit Data / </span> Form</h4>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form class="card-body" enctype="multipart/form-data">
        <h6>1. Gate Information</h6>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_code" class="form-control" placeholder="Gate Code" />
                    <label for="gate_code">Gate Code</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="gate_number" class="form-control" placeholder="Gate Number" />
                    <label for="gate_number">Gate Number</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="door_number" class="form-control" placeholder="Door Number" />
                    <label for="door_number">Door Number</label>
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
