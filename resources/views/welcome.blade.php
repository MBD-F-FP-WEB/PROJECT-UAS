@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "employee",
  'form' => ""
])
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