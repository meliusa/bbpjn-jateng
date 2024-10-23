@extends('layouts.app')
@section('content')
<!-- Content -->
<div class="row gy-4">
    <!-- Gamification Card -->
    <!-- User Details Card -->
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="p-3">
                <div class="mb-4 d-flex align-items-center">
                    <div class="user-info me-4 pe-4 border-end d-flex flex-column justify-content-center" style="flex: 2;">
                        <h4 class="pb-3 mb-5 border-bottom">Overview</h4>
                        <ul class="mb-4 list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Department:</span>
                                <span id="modal-department-detail">Marketing</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">NIP:</span>
                                <span id="modal-nip-detail">123456</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Name:</span>
                                <span id="modal-name-detail">John Doe</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Phone Number:</span>
                                <span id="modal-phone-number-detail">+1234567890</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Address:</span>
                                <span id="modal-address-detail">123 Main St, City</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Position:</span>
                                <span id="modal-position-detail">Manager</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Gate:</span>
                                <span id="modal-gate-detail">Gate 1</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Updated At:</span>
                                <span id="modal-updated-at-detail">2024-01-01 12:00:00</span>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center user-avatar-section ms-auto" style="flex: 1;">
                        <img class="mb-2 rounded img-fluid" src="../../assets/img/avatars/10.png" height="120" width="120" alt="User avatar" />
                        <h4 id="modal-name">John Doe</h4>
                        <span class="badge bg-label-danger rounded-pill" id="modal-position">Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Details Card -->
</div>
<!--/ Content -->
@endsection
