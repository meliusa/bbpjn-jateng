@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Logs /</span> Log List</h4>

<!-- DataTable with Buttons -->
<div class="card">
    <div class="pt-0 card-datatable table-responsive">
        <table class="table datatables-basic table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Gate Code</th>
                    <th>Gate Number</th>
                    <th>Door Number</th>
                    <th>CREATED AT</th>
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
                    <h5 class="pb-3 mb-3 border-bottom">Details</h5>
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
                            <span class="fw-medium text-heading me-2">Gate:</span>
                            <span id="modal-gate-detail"></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-medium text-heading me-2">Updated At:</span>
                            <span id="modal-updated-at-detail"></span>
                        </li>
                    </ul>
                </div>
                <div class="text-center user-avatar-section ms-auto" style="flex: 1;">
                    <img class="mb-2 rounded img-fluid" src="../../assets/img/avatars/10.png" height="120" width="120" alt="User avatar" />
                    <h4 id="modal-username">Name</h4>
                    <span class="badge bg-label-danger rounded-pill">Position</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    "use strict";

    // datatable (jquery)
    $(function () {
        var dt_basic_table = $(".datatables-basic"),
            dt_basic;

        if (dt_basic_table.length) {
            dt_basic = dt_basic_table.DataTable({
                ajax: {
                    url: '/api/logs',
                    dataSrc: function (json) {
                        console.log(json); 
                        return json; 
                    },
                    error: function (xhr, error, thrown) {
                        console.error("Error fetching data: ", error); 
                    }
                },
                columns: [
                    { data: "id" },
                    { data: "member.name" },
                    { data: "gate.gate_code" },
                    { data: "gate.gate_number" },
                    { data: "gate.door_number" },
                    { data: "created_at" },
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
                        targets: 6, 
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
                                '<li><a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logDetails" onclick="showDetails(' + full.id + ')">Details</a></li>' +
                                '<div class="dropdown-divider"></div>' +
                                '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>' +
                                "</ul>" +
                                "</div>" 
                            );
                        },
                    },
                ],
                order: [[6, "desc"]],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0">><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
            });
            $("div.head-label").html('<h5 class="mb-0 card-title">Log List</h5>');
        }

        setTimeout(() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm");
            $(".dataTables_length .form-select").removeClass("form-select-sm");
        }, 300);
    });

    function showDetails(logId) {
        // Fetch log details by ID and update the modal content
        $.ajax({
            url: '/api/logs/' + logId,
            method: 'GET',
            success: function(data) {
                $('#modal-username').text(data.member.name);
                $('#modal-username-detail').text(data.member.username);
                $('#modal-email-detail').text(data.member.email);
                // Update more fields as needed
            },
            error: function() {
                console.error("Error fetching log details.");
            }
        });
    }
</script>
@endsection
