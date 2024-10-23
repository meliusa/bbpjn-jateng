@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Members /</span> Member List</h4>

<!-- DataTable with Buttons -->
<div class="card">
    <div class="pt-0 card-datatable table-responsive">
        <table class="table datatables-basic table-bordered">
            <thead>
                <tr>
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
<!-- Modal to add new record -->
<div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="pt-0 add-new-record row g-3" id="form-add-new-record" onsubmit="return false">
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                            placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
                        <label for="basicFullname">Full Name</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="mdi mdi-briefcase-outline"></i></span>
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                            placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                        <label for="basicPost">Post</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                            placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                        <label for="basicEmail">Email</label>
                    </div>
                </div>
                <div class="form-text">You can use letters, numbers & periods</div>
            </div>
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <span id="basicDate2" class="input-group-text"><i class="mdi mdi-calendar-month-outline"></i></span>
                    <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                            aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        <label for="basicDate">Joining Date</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <span id="basicSalary2" class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                            placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                        <label for="basicSalary">Salary</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!--/ DataTable with Buttons -->
@endsection
@section('custom-js')
<script>
    "use strict";

    // datatable (jquery)
    $(function () {
        var dt_basic_table = $(".datatables-basic"),
            dt_basic;

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
            dt_basic = dt_basic_table.DataTable({
                    ajax: {
                    url: '/api/members',
                    dataSrc: function (json) {
                        console.log(json); 
                        return json; 
                    },
                    error: function (xhr, error, thrown) {
                        console.error("Error fetching data: ", error); 
                    }
                },
                columns: [
                    { data: "department" },
                    { data: "nip" },
                    { data: "name" },
                    { data: "position" },
                    { data: "updated_at" },
                    { data: null },
                ],
                columnDefs: [
                {
                    targets: 4, 
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
                            '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>' +
                            "</ul>" +
                            "</div>" +
                            '<a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>'
                        );
                    },
                },
            ],
                order: [[4, "desc"]],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
                buttons: [
                    {
                        text: '<i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Data</span>',
                        className: "create-new btn btn-primary",
                    },
                ],
            });
            $("div.head-label").html(
                '<h5 class="mb-0 card-title">Member List</h5>'
            );
        }

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm");
            $(".dataTables_length .form-select").removeClass("form-select-sm");
        }, 300);
    });

</script>
@endsection
