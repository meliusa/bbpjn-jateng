@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Members / Add Data / </span> Form</h4>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form class="card-body" enctype="multipart/form-data">
        <h6>1. Personal Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="name" class="form-control" placeholder="Name" />
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="phone_number" class="form-control" placeholder="Phone Number" />
                    <label for="phone_number">Phone Number</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea id="address" class="form-control" placeholder="Address" style="height: 100px;"></textarea>
                    <label for="address">Address</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <input type="file" id="photo" class="form-control" />
                    <label for="photo">Upload Photo</label>
                </div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />
        <h6>2. Work-Related Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="department" class="form-control" placeholder="Department" />
                    <label for="department">Department</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="nip" class="form-control" placeholder="NIP" />
                    <label for="nip">NIP</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="position" class="form-control" placeholder="Position" />
                    <label for="position">Position</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="barcode" class="form-control" placeholder="Barcode" />
                    <label for="barcode">Barcode</label>
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
