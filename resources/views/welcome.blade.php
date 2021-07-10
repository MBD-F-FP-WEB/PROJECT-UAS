@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "dashboard",
  'form' => ""
])
@endsection

@section('header')
<div class="row my-3">
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
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger text-white">
    {{Session::get('error')}}
</div>
@endif
<div class="container mt-5">
  <div class="row">
    <div class="col text-center">
      <h4>Tools</h4>
      <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalSetDiskon">Set Discount</button>
      <div class="modal fade" id="modalSetDiskon" tabindex="-1" aria-labelledby="modalSetDiskon" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSetDiskon">Set Discount</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form role="form text-left" method="POST" action="{{ route('setDiskon') }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Min Produk</label>
                    <input type="number" class="form-control" name="min" id="min" value="0">
                </div>
                <div class="form-group">
                    <label>Discount (%)</label>
                    <input type="number" class="form-control" name="disc" id="disc" value="0">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" data-bs-dismiss="modal">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col text-center mb-3">
      <h4>Another Statistic</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 mx-auto text-center">   
      <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col text-center">
              <p class="lead text-dark text-sm pt-1 mb-3">Most Frequently Purchased Categories by Each Customer</p>
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
                      {{ $cus_cat->max }} 
                    </td>
                    <td>
                      {{ $cus_cat->count }} 
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
            <div class="col text-center">
              <p class="lead text-dark pt-1 text-sm mb-0">Order Per Month</p>
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
