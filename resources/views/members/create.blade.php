@extends('layouts.app')
@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="py-3">
        <span class="text-muted fw-light">Members / Add Data / </span> Form
    </h4>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form class="card-body" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
        @csrf
        <h6>1. Personal Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required />
                    <label for="name">Name</label>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" required />
                    <label for="phone_number">Phone Number</label>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <textarea id="address" name="address" class="form-control" placeholder="Address" required></textarea>
                    <label for="address">Address</label>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="file" id="photo" name="photo" class="form-control" />
                    <label for="photo">Upload Photo (Max: 2MB, JPG/PNG)</label>
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />
        <h6>2. Work-Related Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="department" name="department" class="form-control" placeholder="Department" required />
                    <label for="department">Department</label>
                    @error('department')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" required />
                    <label for="nip">NIP</label>
                    @error('nip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="position" name="position" class="form-control" placeholder="Position" required />
                    <label for="position">Position</label>
                    @error('position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Barcode" required />
                    <label for="barcode">Barcode</label>
                    @error('barcode')
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
