@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "",
  'form' => ""
])
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
    <div class="col-lg-12 mx-auto">
      <div class="mb-4">
        <h3>Most frequently purchased categories by each customer</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Customer</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i>Categories by each Customer</span>
            </div>
            <div class="col-lg-4 text-end my-auto">
              {{-- <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a> --}}
            </div>
          </div>
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
      <!-- End bootstrap marketplace -->
    </div>
  </div>
  <div class="row mx-auto">
    {{ $cus_cats->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE customers
(
	customer_id varchar(255),
	company_name varchar(255),
	contact_name varchar(255),
	contact_title varchar(255),
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	phone varchar(255),
	fax varchar(255),
	PRIMARY KEY (customer_id)
); -->
