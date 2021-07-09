@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "customer",
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
      <div class="mb-4 w-25">
        <h3>Customers Data</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Customer</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i>Customers</span>
            </div>
            <div class="col-lg-4 text-end my-auto">
              {{-- <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a> --}}
            </div>
          </div>
        </div>
        <div class="overflow-scroll">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center" id="data-table" style="font-size: 10px">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Title</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Phone</th>
                <th scope="col">Fax</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
              <tr>
                <td>
                  {{ $customer->customer_id }}
                </td>
                <td>
                  {{ $customer->company_name }} 
                </td>
                <td>
                  {{ $customer->contact_name }} 
                </td>
                <td>
                  {{ $customer->contact_title }}
                </td>
                <td class="text-wrap">
                  {{ $customer->address }}
                </td>
                <td class="text-wrap">
                  {{ $customer->city }}
                </td>
                <td>
                  {{ $customer->region }}
                </td>
                <td>
                  {{ $customer->phone }}
                </td> 
                <td class="text-wrap">
                  {{ $customer->fax }}
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
    {{ $customers->links() }}
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
