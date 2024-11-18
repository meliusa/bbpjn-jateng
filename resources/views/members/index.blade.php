@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Members /</span> Member List</h4>

<!-- Notifikasi Sukses -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Notifikasi Gagal -->
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- DataTable with Buttons -->
<div class="card">
    <div class="pt-0 card-datatable table-responsive">
        <table class="table datatables-basic table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department</th>
                    <th>NIP</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>UPDATED AT</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="logDetails" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="p-3 modal-content p-md-5">
            <div class="mb-4 d-flex align-items-center">
                <div class="user-info me-4 pe-4 border-end d-flex flex-column justify-content-center" style="flex: 2;">
                    <h4 class="pb-3 mb-5 border-bottom">Details</h4>
                    <ul class="mb-4 list-unstyled" id="modal-details">
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Department:</span>
                            <span id="modal-department-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">NIP:</span>
                            <span id="modal-nip-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Name:</span>
                            <span id="modal-name-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Phone Number:</span>
                            <span id="modal-phone-number-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Address:</span>
                            <span id="modal-address-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Position:</span>
                            <span id="modal-position-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Barcode:</span>
                            <span id="modal-barcode-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Updated At:</span>
                            <span id="modal-updated-at-detail"></span>
                        </li>
                    </ul>
                </div>
                <div class="text-center user-avatar-section ms-auto" style="flex: 1;">
                    <img class="mb-2 rounded img-fluid" id="modal-photo" src="" height="120" width="120"
                        alt="User avatar" />
                    <h4 id="modal-name">Name</h4>
                    <span class="badge bg-label-danger rounded-pill" id="modal-position">Position</span>
                </div>
            </div>
            <div class="text-center col-12">
                <button type="button" class="btn btn-outline-secondary btn-reset" data-bs-dismiss="modal"
                    aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    "use strict";

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $(function () {
        var dt_basic_table = $(".datatables-basic"),
            dt_basic;

        if (dt_basic_table.length) {
            dt_basic = dt_basic_table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/api/members',
                    data: function (d) {
                        d.page = d.start / d.length + 1;
                        d.per_page = d.length;
                        d.search = d.search.value;
                    },
                    dataSrc: function (json) {
                        return json.data; 
                    },
                    error: function (xhr, error, thrown) {
                        console.error("Error fetching data: ", error);
                    }
                },
                columns: [
                { data: "id" },
                { data: "department" },
                { data: "nip" },
                { data: "name" },
                { data: "position" },
                { data: "updated_at" },
                { data: null }
                ],
                columnDefs: [{
                        targets: 5,
                        render: function (data) {
                            return new Date(data).toLocaleDateString('id-ID', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit'
                            });
                        }
                    },
                    {
                        targets: -1,
                        title: "Actions",
                        orderable: false,
                        searchable: false,
                        render: function (data, type, full, meta) {
                            return (
                                '<div class="d-inline-block">' +
                                '<a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>' +
                                '<ul class="m-0 dropdown-menu dropdown-menu-end">' +
                                '<li><a href="javascript:;" class="dropdown-item" onclick="showDetails(' +
                                full.id +
                                ')" data-bs-toggle="modal" data-bs-target="#logDetails">Details</a></li>' +
                                '<div class="dropdown-divider"></div>' +
                                '<li><a href="javascript:;" class="dropdown-item text-danger delete-record" data-id="' +
                                full.id + '">Delete</a></li>' +
                                "</ul>" +
                                "</div>" +
                                '<a href="/members/' + full.id +
                                '/edit" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>'
                            );
                        },
                    },
                ],
                order: [
                    [5, "desc"]
                ],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [{
                    text: '<i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Data</span>',
                    className: "create-new btn btn-primary",
                    action: function (e, dt, node, config) {
                        window.location.href = '{{ route("members.create") }}';
                    }
                }, ],
            });

            $("div.head-label").html('<h5 class="mb-0 card-title">Member List</h5>');
        }

        // Handle delete action
        $(document).on('click', '.delete-record', function () {
            const memberId = $(this).data('id');
            if (confirm("Are you sure you want to delete this member?")) {
                $.ajax({
                    url: '/members/' + memberId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token
                    },
                    success: function (result) {
                        dt_basic.ajax.reload(); // Refresh the DataTable
                        alert("Member deleted successfully.");
                    },
                    error: function (xhr) {
                        alert("Error deleting member: " + xhr.responseText);
                    }
                });
            }
        });

        // Filter form control to default size
        setTimeout(() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm");
            $(".dataTables_length .form-select").removeClass("form-select-sm");
        }, 300);
    });

    function showDetails(id) {
        // Fetch member details
        $.ajax({
            url: '/api/members/' + id,
            method: 'GET',
            success: function (data) {
                $('#modal-department-detail').text(data.department);
                $('#modal-nip-detail').text(data.nip);
                $('#modal-name-detail').text(data.name);
                $('#modal-phone-number-detail').text(data.phone_number);
                $('#modal-address-detail').text(data.address);
                $('#modal-position-detail').text(data.position);
                $('#modal-barcode-detail').text(data.barcode);

                $('#modal-updated-at-detail').text(new Date(data.updated_at).toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                }));

                $('#modal-name').text(data.name);
                $('#modal-position').text(data.position);
                $('#modal-photo').attr('src', '/storage/' + data.photo);
            },
            error: function (xhr) {
                console.error("Error fetching member details: ", xhr);
            }
        });
    }

</script>
@endsection
