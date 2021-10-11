@include('includes.header')

<style>
    .text_dark{
        color: black !important;
    }
</style>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Datatable</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Datatable</li>
            </ol>
            <button data-toggle="modal" data-target="#insert_modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Add Client</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My clients</h4>
{{--                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>--}}
                <div class="table-responsive m-t-40">
                    <table id="example23"
                           class="display nowrap table table-hover table-striped table-bordered"
                           cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>mobile number</th>
                                <th>creator</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>mobile number</th>
                                <th>creator</th>
                                <th>actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($clients as $key =>$client)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->mobile_number }}</td>
                                <td>{{ $client->user->name }}</td>
                                <td class="text-center d-flex justify-content-between" style="cursor:pointer;" >
                                    <a href="{{ url("edit_client/{$client->id}") }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ url('clients/'.$client->id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->


<div id="insert_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text_dark">Add new client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route("clients") }}">
                    @csrf
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Client Name </label>
                        <input type="text" class="form-control col-6  text-white" id="client_name" name="name" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="email" class="control-label col-12 text-center text_dark"> email </label>
                        <input type="text" class="form-control col-6  text-white" id="email" name="email" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="mobile_number" class="control-label col-12 text-center text_dark"> mobile number </label>
                        <input type="number" class="form-control col-6  text-white" id="mobile_number" name="mobile_number" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="address" class="control-label col-12 text-center text_dark"> Address </label>
                        <input type="text" class="form-control col-6  text-white" id="address" name="address" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="gender" class="control-label col-12 text-center text_dark"> mobile number </label>
                        <select  class="form-control col-6  text-white" id="gender" name="gender" required>
                            <option value="">~~ select gender ~~</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="form-group m-auto text-center ">
                        <input type="submit" class="form-control col-3 btn btn-primary mt-3 text-white">
                    </div>
                </form>
            </div>
            <div class="modal-footer m-auto text-center">
                <button type="button" class="btn btn-default waves-effect btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@include("includes.footer")

<!-- All Jquery -->



<script>
    $(function () {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
        // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    });

</script>
