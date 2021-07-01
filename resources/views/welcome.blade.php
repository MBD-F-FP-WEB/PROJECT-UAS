@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "employee",
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
      <div class="col-lg-12 mx-auto">
        <div class="mb-4 w-25">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../../presentation.html">Page Sections</a></li>
              <li class="breadcrumb-item active" aria-current="page">Features</li>
            </ol>
          </nav>
          <h3>Features</h3>
        </div>
        <!-- Else bootstrap marketplace -->
        
        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row py-3">
              <div class="col-lg-4 text-start">
                <p class="lead text-dark pt-1 mb-0">Employee</p>
              </div>
              <div class="col-lg-4 mt-1 text-center">
                <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i> Screenshot</span>
              </div>
              <div class="col-lg-4 text-end my-auto">
                <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- End bootstrap marketplace -->
      </div>
    </div>
  </div>
@endsection

@section('script')