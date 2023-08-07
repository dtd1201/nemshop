<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3  d-flex">
            <div class="image">
                <img src="<?php echo e(asset('admin_asset/images/username.png')); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                <?php if(Auth::guard('admin')->check()): ?>
                <?php echo e(Auth::guard('admin')->user()->name); ?>

                <?php endif; ?>
                </a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
            <!-- Brand Logo -->
        <a class="brand-link mb-3 pt-1 pb-1 text-right" href="<?php echo e(route('admin.logout')); ?>"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

        </a>
        <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
        <!-- Sidebar -->
       <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
             <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
             <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
             </div>
          </div>
       </div>
       <!-- Sidebar Menu -->
       <?php
           $routerName=request()->route()->getName();

       ?>
       <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
             <li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Category product
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.categoryproduct.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List category product</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.categoryproduct.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add category product</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Category post
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.categorypost.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List category post</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.categorypost.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add category post</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Menu
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.menu.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List menu</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.menu.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add menu</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Product
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.product.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List product</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.product.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add product</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Post
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.post.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List post</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.post.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add post</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Slider
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.slider.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List slider</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.slider.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add slider</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Setting
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List setting</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.setting.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add setting</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Nhân viên quản lý
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Danh sách nhân viên</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.user.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add nhân viên</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Role
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.role.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Danh sách role</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.role.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add role</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Permission
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.permission.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Danh sách permission</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.permission.create')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add permission</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Quản lý đơn hàng
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.transaction.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Danh sách đơn hàng</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                      Thông tin liên hệ
                      <i class="right fas fa-angle-left"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Danh sách liên hệ</p>
                      </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                      Simple Link
                      <span class="right badge badge-danger">New</span>
                   </p>
                </a>
             </li>
          </ul>
       </nav>
       <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>
<?php /**PATH D:\xampp\htdocs\php-laravel\webbanhang\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>