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
                <h4 class="card-title">My Products with Yajra DataTable</h4>

                <?php if($errors->has('files')): ?>
                    <?php $__currentLoopData = $errors->get('files'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="invalid-feedback" role="alert">
                <strong><?php echo e($error); ?></strong>
            </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                <?php endif; ?>
                <button data-toggle="modal" data-target="#insert_modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add Product</button>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>quantity</th>
                            <th>buying price</th>
                            <th>selling price</th>
                            <th>code</th>
                            <th>images</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
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
                <h4 class="modal-title text_dark">Add new Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('store_product')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Product Name </label>
                        <input type="text" class="form-control col-6  text-white" id="name" name="name" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Quantity </label>
                        <input type="number"class="form-control col-6  text-white" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Buying price </label>
                        <input type="number" step="0.10" class="form-control col-6  text-white" id="buying_price" name="buying_price" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Selling price </label>
                        <input type="number" step="0.10" class="form-control col-6  text-white" id="selling_price" name="selling_price" required>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="name" class="control-label col-12 text-center text_dark"> Brand </label>
                        <select id="" class="form-control col-6  text-white" name="brand_id" required>
                            <option value="">Choose</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="category_id" class="control-label col-12 text-center text_dark"> Category </label>
                        <select id="" class="form-control col-6 text-white" name="category_id" required>
                            <option value="">Choose</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="vendor_id" class="control-label col-12 text-center text_dark"> Vendor </label>
                        <select id="" class="form-control col-6 text-white" name="vendor_id" required>
                            <option value="">Choose</option>
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group m-auto text-center">
                        <label for="images" class="control-label col-12 text-center text_dark"> Images </label>
                        <input type="file" class="form-control col-6  text-white" id="images" name="images[]" multiple required>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    console.time();
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('getProducts')); ?>",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'quantity', name: 'quantity'},
                {data: 'buying_price', name: 'buying_price'},
                {data: 'selling_price', name: 'selling_price'},
                {data: 'code', name: 'code'},
                {data: 'images', name: 'images'},
                {data: 'created_at', name: 'created_at'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });
    console.timeEnd();
</script>
<?php /**PATH C:\xampp\htdocs\dash_cms\resources\views/products.blade.php ENDPATH**/ ?>