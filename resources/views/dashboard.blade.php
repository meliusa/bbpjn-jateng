@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="p-3">
                <div class="mb-4 d-flex align-items-center">
                    <div class="user-info me-4 pe-4 border-end d-flex flex-column justify-content-center" style="flex: 2;">
                        <h4 class="pb-3 mb-5 border-bottom">Overview</h4>
                        <ul class="mb-4 list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Department:</span>
                                <span id="modal-department-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">NIP:</span>
                                <span id="modal-nip-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Name:</span>
                                <span id="modal-name-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Phone Number:</span>
                                <span id="modal-phone-number-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Address:</span>
                                <span id="modal-address-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Position:</span>
                                <span id="modal-position-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Gate:</span>
                                <span id="modal-gate-detail">N/A</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Updated At:</span>
                                <span id="modal-updated-at-detail">N/A</span>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center user-avatar-section ms-auto" style="flex: 1;">
                        <img id="user-avatar" class="mb-2 rounded img-fluid" src="{{ asset('storage/dummy-photo.jpg') }}" height="240" width="240" alt="User avatar" />
                        <h4 id="modal-name">N/A</h4>
                        <span class="badge bg-label-danger rounded-pill" id="modal-position">N/A</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchLatestLog() {
        fetch('{{ route("log.latest") }}')
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('modal-department-detail').innerText = data.member?.department || 'N/A';
                    document.getElementById('modal-nip-detail').innerText = data.member?.nip || 'N/A';
                    document.getElementById('modal-name-detail').innerText = data.member?.name || 'N/A';
                    document.getElementById('modal-phone-number-detail').innerText = data.member?.phone_number || 'N/A';
                    document.getElementById('modal-address-detail').innerText = data.member?.address || 'N/A';
                    document.getElementById('modal-position-detail').innerText = data.member?.position || 'N/A';
                    document.getElementById('modal-gate-detail').innerText = data.gate?.gate_number || 'N/A';
                    document.getElementById('modal-updated-at-detail').innerText = new Date(data.updated_at).toLocaleString() || 'N/A';

                    // Update avatar and name outside of the list
                    document.getElementById('user-avatar').src = data.member?.photo ? `{{ asset('storage') }}/${data.member.photo}` : '{{ asset('storage/dummy-photo.jpg') }}';
                    document.getElementById('modal-name').innerText = data.member?.name || 'N/A';
                    document.getElementById('modal-position').innerText = data.member?.position || 'N/A';
                }
            })
            .catch(error => console.error('Error fetching latest log:', error));
    }

    // Jalankan fetchLatestLog setiap 10 detik
    setInterval(fetchLatestLog, 10000);
    // Panggil sekali saat halaman pertama kali dimuat
    fetchLatestLog();
</script>
@endsection
