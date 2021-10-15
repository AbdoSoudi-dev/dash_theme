<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle">My Brands</h6>
                    <button data-toggle="modal" data-target="#insert_modal" type="button" class="btn btn-info"><i
                            class="fa fa-plus-circle"></i> Add Brand
                    </button>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Creator</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($brand->id); ?></td>
                                <td><?php echo e($brand->name); ?></td>
                                <td><?php echo e($brand->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($brand->user->name); ?></td>
                                <td class="text-center d-flex justify-content-center" style="cursor:pointer;" >
                                    <a style="padding-right: 15px" href="<?php echo e(url('brands/' . $brand->id.'/edit')); ?>">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    <form action="<?php echo e(url('brands/'.$brand->id)); ?>" method="POST">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" style="background-color: transparent; color: white" onclick="return confirm('Are you sure you want to delete this brand?')">
                                            <i class="fas fa-trash-alt fa-2x"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form method="POST" action="<?php echo e(url("brands")); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Brand Name </label>
                        <input type="text" class="form-control col-6  text-white" id="brand_name" name="name" required>
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


<?php echo $__env->make("includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH C:\xampp\htdocs\dash_cms\resources\views/brands.blade.php ENDPATH**/ ?>