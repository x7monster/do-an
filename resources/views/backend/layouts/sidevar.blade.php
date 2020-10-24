@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2 sidebar-menu">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->role=='Admin')
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends"></i>
              <p>
                Người Dùng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Người Dùng</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-id-card"></i>
              <p>
                Quản Lý Cá Nhân
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thông Tin Của Bạn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đổi Mật Khẩu</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-cogs"></i>
              <p>
                Logo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logos.view')}}" class="nav-link {{($route=='logos.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Logo</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-images"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.view')}}" class="nav-link {{($route=='sliders.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Slider</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-address-book"></i>
              <p>
                Liên Hệ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contacts.view')}}" class="nav-link {{($route=='contacts.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Liên Hệ</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('contacts.communicate')}}" class="nav-link {{($route=='contacts.communicate')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Thông Tin LH</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/abouts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="far fa-file-alt"></i>
              <p>
                Thông Tin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('abouts.view')}}" class="nav-link {{($route=='abouts.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Thông Tin</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/news')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="far fa-newspaper"></i>
              <p>
                Tin Tức
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('news.view')}}" class="nav-link {{($route=='news.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Tin Tức</p>
                </a>
              </li>
            </ul>
          </li>   

          <li class="nav-item has-treeview {{($prefix=='/categories')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-atlas"></i>
              <p>
                Loại Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Loại Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="far fa-copyright"></i>
              <p>
                Nhãn Hiệu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view')}}" class="nav-link {{($route=='brands.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Nhãn Hiệu</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/colors')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-palette"></i>
              <p>
                Quản Lý Màu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('colors.view')}}" class="nav-link {{($route=='colors.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Màu</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/sizes')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-sitemap"></i>
              <p>
                Kích Thước
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sizes.view')}}" class="nav-link {{($route=='sizes.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Kích Thước</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/sponsors')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-crown"></i>
              <p>
                Nhà Tài Trợ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sponsors.view')}}" class="nav-link {{($route=='sponsors.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Nhà Tài Trợ</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fab fa-product-hunt"></i>
              <p>
                Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link {{($route=='products.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-user-tag"></i>
              <p>
                Khách Hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem Khách Hàng</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('customers.draft.view')}}" class="nav-link {{($route=='customers.draft.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thông Tin Khách Hàng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/orders')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
              <p>
                Đặt Hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('orders.pending.list')}}" class="nav-link {{($route=='orders.pending.list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đang Chờ Xử Lý</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('orders.approved.list')}}" class="nav-link {{($route=='orders.approved.list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn Hàng Đã Chấp Nhận</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->