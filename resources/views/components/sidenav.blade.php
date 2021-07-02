<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}">
      <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">NorthWind App</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        @php
          $forms_active = '';
          $forms_show = '';
        @endphp
        @if ($active == "forms")
        @php
          $forms_active = 'active';
          $forms_show = 'show';
        @endphp
        @endif
        <a class="nav-link {{$forms_active}}" data-bs-toggle="collapse" href="https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html#dashboardsExamples" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            @include('icons.shop')
          </div>
          <span class="nav-link-text ms-1">Forms</span>
        </a>
        <div class="collapse {{$forms_show}}" id="dashboardsExamples">
          <ul class="nav ms-4 ps-3">

            @php
              $category_form_active = '';
            @endphp
            @if ($form == "category")
            @php
              $category_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$category_form_active}}">
              <a class="nav-link {{$category_form_active}}" href="{{ route('form.category') }}">
                <span class="sidenav-mini-icon"> Ca </span>
                <span class="sidenav-normal"> Category </span>
              </a>
            </li>

            @php
              $customer_customer_demo_form_active = '';
            @endphp
            @if ($form == "customer_customer_demo")
            @php
              $customer_customer_demo_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$customer_customer_demo_form_active}}">
              <a class="nav-link {{$customer_customer_demo_form_active}}" href="{{ route('form.customer_customer_demo') }}">
                <span class="sidenav-mini-icon"> CCD </span>
                <span class="sidenav-normal"> Customer Customer Demo </span>
              </a>
            </li>

            @php
              $customer_demographics_form_active = '';
            @endphp
            @if ($form == "customer_demographics")
            @php
              $customer_demographics_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$customer_demographics_form_active}}">
              <a class="nav-link {{$customer_demographics_form_active}}" href="{{ route('form.customer_demographics') }}">
                <span class="sidenav-mini-icon"> CD </span>
                <span class="sidenav-normal"> Customer Demographics </span>
              </a>
            </li>
            
            @php
              $customer_form_active = '';
            @endphp
            @if ($form == "customer")
            @php
              $customer_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$customer_form_active}}">
              <a class="nav-link {{$customer_form_active}}" href="{{ route('form.customer') }}">
                <span class="sidenav-mini-icon"> Cu </span>
                <span class="sidenav-normal"> Customer </span>
              </a>
            </li>
            
            @php
              $employee_territories_form_active = '';
            @endphp
            @if ($form == "employee_territories")
            @php
              $employee_territories_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$employee_territories_form_active}}">
              <a class="nav-link {{$employee_territories_form_active}}" href="{{ route('form.employee_territories') }}">
                <span class="sidenav-mini-icon"> ET </span>
                <span class="sidenav-normal"> Employee Territories </span>
              </a>
            </li>
            
            @php
              $employee_form_active = '';
            @endphp
            @if ($form == "employee")
            @php
              $employee_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$employee_form_active}}">
              <a class="nav-link {{$employee_form_active}}" href="{{ route('form.employee') }}">
                <span class="sidenav-mini-icon"> E </span>
                <span class="sidenav-normal"> Employee </span>
              </a>
            </li>
            
            @php
              $order_detail_form_active = '';
            @endphp
            @if ($form == "order_detail")
            @php
              $order_detail_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$order_detail_form_active}}">
              <a class="nav-link {{$order_detail_form_active}}" href="{{ route('form.order_detail') }}">
                <span class="sidenav-mini-icon"> OD </span>
                <span class="sidenav-normal"> Order Detail </span>
              </a>
            </li>
            
            @php
              $order_form_active = '';
            @endphp
            @if ($form == "order")
            @php
              $order_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$order_form_active}}">
              <a class="nav-link {{$order_form_active}}" href="{{ route('form.order') }}">
                <span class="sidenav-mini-icon"> O </span>
                <span class="sidenav-normal"> Order </span>
              </a>
            </li>
            
            @php
              $product_form_active = '';
            @endphp
            @if ($form == "product")
            @php
              $product_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$product_form_active}}">
              <a class="nav-link {{$product_form_active}}" href="{{ route('form.product') }}">
                <span class="sidenav-mini-icon"> P </span>
                <span class="sidenav-normal"> Product </span>
              </a>
            </li>
            
            @php
              $region_form_active = '';
            @endphp
            @if ($form == "region")
            @php
              $region_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$region_form_active}}">
              <a class="nav-link {{$region_form_active}}" href="{{ route('form.region') }}">
                <span class="sidenav-mini-icon"> R </span>
                <span class="sidenav-normal"> Region </span>
              </a>
            </li>
            
            @php
              $shipper_form_active = '';
            @endphp
            @if ($form == "shipper")
            @php
              $shipper_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$shipper_form_active}}">
              <a class="nav-link {{$shipper_form_active}}" href="{{ route('form.shipper') }}">
                <span class="sidenav-mini-icon"> Sh </span>
                <span class="sidenav-normal"> Shipper </span>
              </a>
            </li>
            
            @php
              $supplier_form_active = '';
            @endphp
            @if ($form == "supplier")
            @php
              $supplier_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$supplier_form_active}}">
              <a class="nav-link {{$supplier_form_active}}" href="{{ route('form.supplier') }}">
                <span class="sidenav-mini-icon"> Su </span>
                <span class="sidenav-normal"> Supplier </span>
              </a>
            </li>
            
            @php
              $territory_form_active = '';
            @endphp
            @if ($form == "territory")
            @php
              $territory_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$territory_form_active}}">
              <a class="nav-link {{$territory_form_active}}" href="{{ route('form.territory') }}">
                <span class="sidenav-mini-icon"> T </span>
                <span class="sidenav-normal"> Territory </span>
              </a>
            </li>
            
            @php
              $us_states_form_active = '';
            @endphp
            @if ($form == "us_states")
            @php
              $us_states_form_active = 'active';
            @endphp
            @endif
            <li class="nav-item {{$us_states_form_active}}">
              <a class="nav-link {{$us_states_form_active}}" href="{{ route('form.us_states') }}">
                <span class="sidenav-mini-icon"> US </span>
                <span class="sidenav-normal"> US States </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        @php
          $employee_active = '';
        @endphp
        @if ($active == "employee")
        @php
          $employee_active = 'active';
        @endphp
        @endif
        <a class="nav-link {{$employee_active}}" href="{{ route('table.employee') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.office')
          </div>
          <span class="nav-link-text ms-1">Employee</span>
        </a>
      </li>
      <li class="nav-item">
        @php
          $customer_active = '';
        @endphp
        @if ($active == "customer")
        @php
          $customer_active = 'active';
        @endphp
        @endif
        <a class="nav-link {{$customer_active}}" href="{{ route('table.customer') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.office')
          </div>
          <span class="nav-link-text ms-1">Customer</span>
        </a>
      </li>
      <li class="nav-item">
        @php
          $product_active = '';
        @endphp
        @if ($active == "product")
        @php
          $product_active = 'active';
        @endphp
        @endif
        <a class="nav-link {{$product_active}}" href="{{ route('table.product') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.office')
          </div>
          <span class="nav-link-text ms-1">Product</span>
        </a>
      </li>
      <li class="nav-item">
        @php
          $order_active = '';
        @endphp
        @if ($active == "order")
        @php
          $order_active = 'active';
        @endphp
        @endif
        <a class="nav-link {{$order_active}}" href="{{ route('table.order') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.office')
          </div>
          <span class="nav-link-text ms-1">Order</span>
        </a>
      </li>
      
      {{-- <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/billing.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.credit-card')
          </div>
          <span class="nav-link-text ms-1">Billing</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/virtual-reality.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.box-3d')
          </div>
          <span class="nav-link-text ms-1">Virtual Reality</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/rtl.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.settings')
          </div>
          <span class="nav-link-text ms-1">RTL</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/profile.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.customer-support')
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/sign-in.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.document')
          </div>
          <span class="nav-link-text ms-1">Sign In</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ asset('pages/sign-up.html') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            @include('icons.spaceship')
          </div>
          <span class="nav-link-text ms-1">Sign Up</span>
        </a>
      </li> --}}
    </ul>
  </div>
</aside>
