@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "dashboard",
  'form' => ""
])
@endsection

@section('header')
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Product</p>
              <h5 class="font-weight-bolder mb-0">
                {{$product}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Employee</p>
              <h5 class="font-weight-bolder mb-0">
                {{$employee}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Customer</p>
              <h5 class="font-weight-bolder mb-0">
                {{$customer}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales Order</p>
              <h5 class="font-weight-bolder mb-0">
                {{$order}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-lg-6 mx-auto">        
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row py-3">
              <div class="col-lg-9 text-start">
                <p class="lead text-dark pt-1 mb-3">Most frequently purchased categories by each customer</p>
              </div>
              <div class="col-lg-3 text-end my-auto">
                <a href="{{ route('table.detail.customer_category') }}" class="text-primary icon-move-right">View All
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="data-table">
                  <thead class="thead-light">
                    <tr class="text-center">
                      <th scope="col">Contact Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cus_cats as $cus_cat)
                    <tr class="text-center">
                      <td>
                        {{ $cus_cat->contact_name }}
                      </td>
                      <td>
                        {{ $cus_cat->category_name }} 
                      </td>
                      <td>
                        {{ $cus_cat->jml }} 
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

      <div class="col-lg-6 mx-auto">
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row py-3">
              <div class="col-lg-9 text-start">
                <p class="lead text-dark pt-1 mb-0">Order Per Month</p>
              </div>
              <div class="col-lg-3 text-end my-auto">
                <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="data-table">
                  <thead class="thead-light">
                    <tr class="text-center">
                      <th scope="col">Year</th>
                      <th scope="col">Month</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_pm as $order)
                    <tr class="text-center">
                      <td>
                        {{ $order->yyyy }}
                      </td>
                      <td>
                        {{ $order->mon }} 
                      </td>
                      <td>
                        {{ $order->jml }} 
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
    </div>
  </div>
@endsection

@section('script')
@endsection
