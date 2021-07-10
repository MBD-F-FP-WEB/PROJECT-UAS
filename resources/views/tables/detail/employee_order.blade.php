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
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="mb-4 w-25">
        <h3>Orders by: {{$l_name}}</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Employee</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i>Orders</span>
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
          <table class="table align-items-center table-flush" id="data-table" style="font-size: 9px;">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">order_id</th>
                <th scope="col">product_name</th>
                <th scope="col">order_date</th>
                <th scope="col">required_date</th>
                <th scope="col">shipped_date</th>
                <th scope="col">ship_via</th>
                <th scope="col">freight</th>
                <th scope="col">ship_name</th>
                <th scope="col">ship_address</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              {{-- {{dd($order)}} --}}
              <tr class="text-center">
                <td>
                  {{ $order->order_id }}
                </td>
                <td>
                  {{ $order->product_name }}
                </td>
                <td>
                  {{ $order->order_date }}
                </td>
                <td>
                  {{ $order->required_date }}
                </td>
                <td>
                  {{ $order->shipped_date }}
                </td>
                <td>
                  {{ $order->ship_via }}
                </td>
                <td>
                  {{ $order->freight }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_name }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_address }}
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
  <div class="row mx-auto text-center">
    {{ $orders->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE orders
(
	order_id int,
	customer_id varchar(255),
	employee_id int,
	order_date date,
	required_date date,
	shipped_date date,
	ship_via int,
	freight int,
	ship_name varchar(255),
	ship_address varchar(255),
	ship_city varchar(255),
	ship_region varchar(255),
	ship_postal_code varchar(255),
	ship_country varchar(255),
	PRIMARY KEY (order_id),
	CONSTRAINT fk_o_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_o_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employees(employee_id),
	CONSTRAINT fk_o_to_shippers 
		FOREIGN KEY (ship_via) 
		REFERENCES shippers(shipper_id)
); -->