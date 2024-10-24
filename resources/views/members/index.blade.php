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
@endsection

@section('custom-js')
<script>
    "use strict";

    // Get the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $(function () {
        var dt_basic_table = $(".datatables-basic"),
            dt_basic;

        if (dt_basic_table.length) {
            dt_basic = dt_basic_table.DataTable({
                ajax: {
                    url: '/api/members',
                    dataSrc: function (json) {
                        return json;
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
                    { data: null },
                ],
                columnDefs: [
                    {
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
                                '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
                                '<div class="dropdown-divider"></div>' +
                                '<li><a href="javascript:;" class="dropdown-item text-danger delete-record" data-id="' + full.id + '">Delete</a></li>' +
                                "</ul>" +
                                "</div>" +
                                '<a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>'
                            );
                        },
                    },
                ],
                order: [[5, "desc"]],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [
                    {
                        text: '<i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Data</span>',
                        className: "create-new btn btn-primary",
                        action: function ( e, dt, node, config ) {
                            window.location.href = '{{ route("members.create") }}';
                        }
                    },
                ],
            });
            $("div.head-label").html(
                '<h5 class="mb-0 card-title">Member List</h5>'
            );
        }

        // Handle delete action
        $(document).on('click', '.delete-record', function() {
            const memberId = $(this).data('id');
            if (confirm("Are you sure you want to delete this member?")) {
                $.ajax({
                        url: '/members/' + memberId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Include the CSRF token
                        },
                    success: function(result) {
                        dt_basic.ajax.reload(); // Refresh the DataTable
                        alert("Member deleted successfully.");
                    },
                    error: function(xhr) {
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
</script>
@endsection

