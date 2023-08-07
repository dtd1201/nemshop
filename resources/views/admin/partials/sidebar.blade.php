<style>
	body {
		font-family: 'Open Sans', sans-serif;
		background-color: #fff!important;
	}
	@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
	.nav-item i {
		padding-right: 5px;
	}
	.nav-sidebar>.nav-item a p {
		font-size: 14px;
	}
	.nav-treeview>.nav-item>.nav-link {
		color: #eee;
		padding: 4px 20px 4px 32px;
	}
	.nav-item i {
		color: #b3cbdd;
		padding-right: 5px;
	}
	.nav-treeview>.nav-item>.nav-link p {
		font-size: 12px;
		color: #b3cbdd
	}
	.nav-treeview>.nav-item>.nav-link i {
		font-size: 12px;
		color: #b3cbdd
	}
	.sidebar {
		background: #2A3F54;
		padding: 0;
	}
	.sidebar a {
		color: #17a2b8;
	}
	.form-inline {
		padding: 15px 0;
	}
	.nav-sidebar>.nav-item {
		color: #b3cbdd;
		font-size: 14px;
		padding-left: 0px;
		border-bottom: 1px solid #25384c;
		border-top: 1px solid #304558;
	}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2A3F54;">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3  d-flex" style="padding: 0px 0 0 0;">
            <div class="image">
                <img src="{{asset('admin_asset/images/username.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                @if (Auth::guard('admin')->check())
                {{ Auth::guard('admin')->user()->name }}
                @endif
                </a>
            </div>
        </div>
       {{-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
             <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
             <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
             </div>
          </div>
       </div> --}}
       <!-- Sidebar Menu -->
       @php
           $routerName=request()->route()->getName();
       @endphp
       <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			  <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                   <i class="fas fa-tachometer-alt"></i>
                   <p>BẢNG ĐIỀU KHIỂN</p>
                </a>
             </li>
			  {{--<li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-edit"></i>
                   <p>
                      Menu
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('menu-list')
                   <li class="nav-item">
                      <a href="{{route('admin.menu.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>List menu</p>
                      </a>
                   </li>
                   @endcan
                   @can('menu-add')
                   <li class="nav-item">
                      <a href="{{route('admin.menu.create')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Thêm menu</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>--}}

             {{--<li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="fas fa-chart-bar"></i>
                   <p>
                      Sản phẩm
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('category-product-list')
                   	<li class="nav-item">
                      <a href="{{route('admin.categoryproduct.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh mục sản phẩm</p>
                      </a>
                   	</li>
                    @endcan
                    @can('product-list')
					      <li class="nav-item">
                      <a href="{{route('admin.product.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Sản phẩm</p>
                      </a>
                    </li>
                   @endcan
                    <li class="nav-item">
                     <a href="{{route('admin.variant.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Biến thể sản phẩm
                        <i class="right fas fa-angle-right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('admin.variant-value.index')}}" class="nav-link">
                              <i class="fas fa-angle-double-right"></i>
                              <p>Giá trị biến thể</p>
                           </a>
                         </li>
                     </ul>
                   </li> 
                  @can('product-list')
                   <li class="nav-item">
                     <a href="{{route('admin.attribute.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Thuộc tính sản phẩm</p>
                     </a>
                   </li>
                  @endcan 
                  <li class="nav-item">
                     <a href="{{route('admin.question.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Câu hỏi thường gặp</p>
                     </a>
                   </li>
                    @can('product-list')
                  <li class="nav-item">
                    <a href="{{route('admin.supplier.index')}}" class="nav-link">
                       <i class="fas fa-angle-double-right"></i>
                       <p>Tư vấn chuyên môn</p>
                    </a>
                  </li>
                 @endcan
                 @can('product-list')
                  <li class="nav-item">
                    <a href="{{route('admin.comment.index',['type_comment'=> 1])}}" class="nav-link">
                       <i class="fas fa-angle-double-right"></i>
                       <p>Danh sách bình luận</p>
                    </a>
                  </li>
                 @endcan
                 @can('product-list')
                  <li class="nav-item">
                    <a href="{{route('admin.productstar.index')}}" class="nav-link">
                       <i class="fas fa-angle-double-right"></i>
                       <p>Danh sách đánh giá sao</p>
                    </a>
                  </li>
                 @endcan
                </ul>
             </li>--}}
             {{--@canany(['product-list'])
             <li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="fab fa-product-hunt"></i>
                   <p>
                      Quản lý nhà cung cấp
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('admin.supplier.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Nhà cung cấp</p>
                      </a>
                    </li>
                </ul>
            </li>
            @endcan--}}
            @canany(['agency-list'])
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-users"></i>
                   <p>
                      Quản lý đại lý
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="{{route('admin.agency.index')}}" class="nav-link">
                         <i class="fas fa-user-check"></i>
                         <p>Danh sách đại lý</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.agency.congno')}}" class="nav-link">
                         <i class="fas fa-user-check"></i>
                         <p>Đơn đại lý</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.agency.create')}}" class="nav-link">
                         <i class="fas fa-user-plus"></i>
                         <p>Thêm đại lý</p>
                      </a>
                   </li>
                </ul>
             </li>
             @endcan
            @canany(['khoan-chi-list'])
            <li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="fab fa-product-hunt"></i>
                   <p>
                      Quản lý khoản chi
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('admin.khoanChi.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Khoản chi</p>
                      </a>
                    </li>
                </ul>
            </li>
            @endcan
             
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-globe-americas"></i>
                   <p>
                      Tuyển dụng
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('category-post-list')
                   <li class="nav-item">
                      <a href="{{route('admin.categorypost.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh mục</p>
                      </a>
                   </li>
                   @endcan
                   @can('post-list')
					<li class="nav-item">
                      <a href="{{route('admin.post.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Vị trí tuyển dụng</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>
             @canany(['bank-list','bank-add'])
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-university"></i>
                   <p>
                     Quản lý Ngân hàng
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('bank-list')
                   <li class="nav-item">
                      <a href="{{route('admin.bank.index')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Danh sách ngân hàng</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>
             @endcan
             @canany(['store-list','store-add'])
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-warehouse"></i>
                   <p>
                     Quản lý kho
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('store-list')

                   <!-- <li class="nav-item">
                      <a href="{{route('admin.store.index')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Danh sách xuất nhập</p>
                      </a>
                   </li> -->
                   <li class="nav-item">
                      <a href="{{route('admin.store.listXuatKho')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Danh sách xuất</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.store.listKhoHang')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Sản phẩm trong kho</p>
                      </a>
                   </li>
                   
                   @endcan
                   @can('store-input')
                   <li class="nav-item">
                      <a href="{{route('admin.store.listLoHang')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Danh sách lô hàng</p>
                      </a>
                   </li>
                   {{--
                   <li class="nav-item">
                      <a href="{{route('admin.store.createLoHang')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Thêm lô hàng</p>
                      </a>
                   </li>
                   --}}
                   <li class="nav-item">
                      <a href="{{route('admin.store.listNhapKho')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Danh sách nhập</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.store.createNhapKhoHang')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Nhập hàng</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.store.listDefectiveProduct')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Sản phẩm lỗi</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.store.listYeuCau')}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Yêu cầu đổi trả</p>
                      </a>
                   </li>
                   <!-- <li class="nav-item">
                      <a href="{{route('admin.store.create',['type'=>1])}}" class="nav-link">
                         <i class="fas fa-folder-plus"></i>
                         <p>Nhập kho</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="{{route('admin.store.create',['type'=>3])}}" class="nav-link">
                          <i class="fas fa-folder-plus"></i>
                          <p>Xuất kho</p>
                      </a>
                    </li> -->
                    @endcan
                    @can('product-list')
                    <!-- <li class="nav-item">
                        <a href="{{route('admin.product.index')}}" class="nav-link">
                            <i class="fas fa-folder-plus"></i>
                            <p>Tổng kho</p>
                        </a>
                    </li> -->
                    @endcan
                </ul>
             </li>
             @endcan
			   <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cog"></i>
                   <p>
                      Trang thông tin
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('setting-list')
                   <li class="nav-item">
                      <a href="{{route('admin.setting.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Trang thông tin</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-images"></i>
                   <p>
                      Quản lý slide
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                  {{--<li class="nav-item">
                     <a href="{{ route('admin.categoryslider.index') }}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh mục</p>
                     </a>
                  </li>--}}
                    @can('slider-list')
                   <li class="nav-item">
                      <a href="{{route('admin.slider.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Hình ảnh</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>
             {{--@canany(['transaction-list'])
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cart-plus"></i>
                   <p>
                      Quản lý đơn hàng
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('permission-add')
                   <li class="nav-item">
                      <a href="{{route('admin.transaction.index')}}" class="nav-link">
                         <i class="fas fa-cart-plus"></i>
                         <p>Đơn hàng</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li>
             @endcan--}}
             {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cart-plus"></i>
                   <p>
                      Quản lý đánh giá sao
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="{{route('admin.productstar.index')}}" class="nav-link">
                         <i class="fas fa-cart-plus"></i>
                         <p>Đánh giá</p>
                      </a>
                   </li>
                </ul>
             </li> --}}

             
             {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-tasks"></i>
                   <p>
                      Phần mở rộng
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('permission-list')
                   <li class="nav-item">
                      <a href="{{route('admin.permission.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Mô đun</p>
                      </a>
                   </li>
                   @endcan
                </ul>
             </li> --}}
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-id-card-alt"></i>
                   <p>
                      Thông tin liên hệ
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                   <li class="nav-item">
                      <a href="{{route('admin.contact.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Danh sách liên hệ</p>
                      </a>
                   </li>
                </ul>
             </li>

             {{--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="fas fa-images"></i>
                  <p>
                     Quản lý mã code
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('admin.code.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Mã code</p>
                     </a>
                  </li>
               </ul>
            </li>--}}
            {{--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>
                     Quản lý Thành viên
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                
                  <li class="nav-item">
                     <a href="{{route('admin.user_frontend.index')}}" class="nav-link">
                        <i class="fas fa-user-check"></i>
                        <p>Danh sách thành viên</p>
                     </a>
                  </li>
                
                       <li class="nav-item">
                           <a href="{{route('admin.user_frontend.create')}}" class="nav-link">
                               <i class="fas fa-user-plus"></i>
                               <p>Thêm thành viên</p>
                           </a>
                       </li>
                
                  <li class="nav-item">
                       <a href="{{route('admin.user_frontend.index',['fill_action'=>'userActive'])}}" class="nav-link">
                       <i class="fas fa-user-check"></i>
                       <p>Đã kích hoạt</p>
                       </a>
                   </li>

                  <li class="nav-item">
                       <a href="{{route('admin.user_frontend.index',['fill_action'=>'userNoActive'])}}" class="nav-link">
                       <i class="fas fa-user-clock"></i>
                       <p>Đang đợi kích hoạt</p>
                       </a>
                   </li>

        

               </ul>
            </li>--}}
            @canany(['report-list'])
             <li class="nav-item">
                <a href="#" class="nav-link ">
                   <i class="fab fa-product-hunt"></i>
                   <p>
                      Báo cáo thống kê
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('admin.report.index')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Báo cáo thống kê</p>
                      </a>
                    </li>
                </ul>
            </li>
            @endcan
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fas fa-cog"></i>
                   <p>
                      Hệ thống
                      <i class="right fas fa-angle-right"></i>
                   </p>
                </a>
				   <ul class="nav nav-treeview">
                    @can('admin-user-list')
                   <li class="nav-item">
                      <a href="{{route('admin.user.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Quản trị viên</p>
                      </a>
                   </li>
                   @endcan
                   @can('role-add')
					   <li class="nav-item">
                      <a href="{{route('admin.role.index')}}" class="nav-link">
                         <i class="fas fa-angle-double-right"></i>
                         <p>Vai trò</p>
                      </a>
                   </li>
                   @endcan
                   @can('permission-list')
                        <li class="nav-item">
                           <a href="{{ route('admin.permission.index') }}" class="nav-link">
                              <i class="fas fa-angle-double-right"></i>
                              <p>Mô đun</p>
                           </a>
                        </li>
                  @endcan
               </ul>
             </li>
			  <!--
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                      Simple Link
                      <span class="right badge badge-danger">New</span>
                   </p>
                </a>
             </li>-->
          </ul>
       </nav>
    </div>
 </aside>
