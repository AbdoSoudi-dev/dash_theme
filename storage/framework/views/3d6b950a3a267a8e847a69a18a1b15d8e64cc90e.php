<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="<?php echo e(url('assets/images/users/2.jpg')); ?>" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(auth()->user()->name); ?> <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();document.getElementById('form_logout').submit()"
                           class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>

        <form action="<?php echo e(route("logout")); ?>" id="form_logout" method="POST">
            <?php echo csrf_field(); ?>
        </form>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap"></li>
                <li> <a class="waves-effect waves-dark" href="<?php echo e(url("/")); ?>">

                        <span class="hide-menu">Dashboard</span></a>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i>
                        <span class="hide-menu">DataTable Entry</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo e(route("clients")); ?>">Clients</a></li>
                        <li><a href="<?php echo e(route("products")); ?>">Products Yajra</a></li>
                        <li><a href="<?php echo e(route("productsDatatable")); ?>">Products datTable</a></li>
                        <li><a href="<?php echo e(url("/brands")); ?>">Brands</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH C:\xampp\htdocs\dash_cms\resources\views/includes/side_bar.blade.php ENDPATH**/ ?>