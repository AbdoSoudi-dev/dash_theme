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
                <li class="breadcrumb-item active">Brands</li>
            </ol>
            <button data-toggle="modal" data-target="#insert_modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> edit brand</button>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Edit <?php echo e($brand->name); ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(url("brands/". $brand->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-body">
                        <h3 class="card-title">Brand Info</h3>
                        <hr>
                        <div class="row p-t-20 m-auto">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="control-label">Brand name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo e($brand->name); ?>">
                                </div>
                            </div>
                    </div>
                    <div class="form-actions text-center m-auto">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save
                        </button>
                        <button type="button" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->




<?php echo $__env->make("includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- All Jquery -->



<?php /**PATH C:\xampp\htdocs\dash_cms\resources\views/edit_brand.blade.php ENDPATH**/ ?>