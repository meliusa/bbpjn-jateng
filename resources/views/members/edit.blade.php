@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="py-3">
        <span class="text-muted fw-light">Members / Edit Data / </span> Form
    </h4>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<!-- Multi Column with Form Separator -->
<div class="mb-4 card">
    <h5 class="card-header">Form</h5>
    <form action="{{ route('members.update', $member->id) }}" method="POST" class="card-body" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h6>1. Personal Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ $member->name }}" required />
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ $member->phone_number }}" />
                    <label for="phone_number">Phone Number</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <textarea id="address" name="address" class="form-control" placeholder="Address" rows="4" required style="height: 240px;">{{ $member->address }}</textarea>
                    <label for="address">Address</label>
                </div>
            </div>
            <div class="col-md-6">
                <label for="current_photo">Current Photo:</label><br>
                @if ($member->photo)
                    <img class="mb-2 rounded img-fluid" src="{{ asset('storage/' . $member->photo) }}" height="120" width="120" alt="Current Photo" />
                @else
                    <p>No current photo available.</p>
                @endif
                <div class="form-floating form-floating-outline">
                    <input type="file" id="photo" name="photo" class="form-control" />
                    <label for="photo">Upload New Photo</label>
                </div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />
        <h6>2. Work-Related Information</h6>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="department" name="department" class="form-control" placeholder="Department" value="{{ $member->department }}" required />
                    <label for="department">Department</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="{{ $member->nip }}" required />
                    <label for="nip">NIP</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="position" name="position" class="form-control" placeholder="Position" value="{{ $member->position }}" required />
                    <label for="position">Position</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Barcode" value="{{ $member->barcode }}" />
                    <label for="barcode">Barcode</label>
                </div>
            </div>
        </div>
        <div class="pt-4 text-end">
            <button type="submit" class="btn btn-warning me-sm-3 me-1">Update</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
    </form>
</div>
@endsection
