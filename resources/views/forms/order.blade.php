@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "order"
])
@endsection

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "category"
])
@endsection

@section('content')
<div class="card mt-4 z-index-0">
	<div class="card-header text-center pt-4">
		<h5>Order Form</h5>
	</div>
	<div class="card-body">
		<!-- Success message -->
		@if(Session::has('success'))
		<div class="alert alert-success">
				{{Session::get('success')}}
		</div>  
		@endif
		<form role="form text-left" method="POST" action="{{ route('form.order.store') }}">
			<div class="form-group">
					<label>customer_id</label>
					<select class="form-control" name="customer_id">
						@foreach($customer_ids as $customer_id)
						<option value="{{$customer_id}}">{{$customer_id}}</option>
						@endforeach
					</select>

					<!-- Error -->
					@if ($errors->has('supplier_id'))
					<div class="error">
							{{ $errors->first('supplier_id') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>employee_id</label>
					<select class="form-control" name="employee_id">
						@foreach($employee_ids as $employee_id)
						<option value="{{$employee_id}}">{{$employee_id}}</option>
						@endforeach
            <option value="null"></option>
					</select>

					<!-- Error -->
					@if ($errors->has('employee_id'))
					<div class="error">
							{{ $errors->first('employee_id') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>order_date</label>
					<input type="date" class="form-control {{ $errors->has('order_date') ? 'error' : '' }}" name="order_date" id="order_date" value="{{ old('order_date') }}">

					<!-- Error -->
					@if ($errors->has('order_date'))
					<div class="error">
							{{ $errors->first('order_date') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>required_date</label>
					<input type="date" class="form-control {{ $errors->has('required_date') ? 'error' : '' }}" name="required_date" id="required_date" value="{{ old('required_date') }}">

					<!-- Error -->
					@if ($errors->has('required_date'))
					<div class="error">
							{{ $errors->first('required_date') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>shipped_date</label>
					<input type="date" class="form-control {{ $errors->has('shipped_date') ? 'error' : '' }}" name="shipped_date" id="shipped_date" value="{{ old('shipped_date') }}">

					<!-- Error -->
					@if ($errors->has('shipped_date'))
					<div class="error">
							{{ $errors->first('shipped_date') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>ship_via</label>
					<select class="form-control" name="ship_via">
						@foreach($shipper_ids as $shipper_id)
						<option value="{{$shipper_id}}">{{$shipper_id}}</option>
						@endforeach
            <option value="null"></option>
					</select>

					<!-- Error -->
					@if ($errors->has('shipper_id'))
					<div class="error">
							{{ $errors->first('shipper_id') }}
					</div>
					@endif
			</div>

			
			<div class="form-group">
					<label>freight</label>
					<input type="text" class="form-control {{ $errors->has('freight') ? 'error' : '' }}" name="freight" id="freight" value="{{ old('freight') }}">

					<!-- Error -->
					@if ($errors->has('freight'))
					<div class="error">
							{{ $errors->first('freight') }}
					</div>
					@endif
			</div>







			<div class="form-group">
					<label>ship_name</label>
					<input type="text" class="form-control {{ $errors->has('ship_name') ? 'error' : '' }}" name="ship_name" id="ship_name" value="{{ old('ship_name') }}">

					<!-- Error -->
					@if ($errors->has('ship_name'))
					<div class="error">
							{{ $errors->first('ship_name') }}
					</div>
					@endif
			</div>
			<div class="form-group">
					<label>ship_address</label>
					<input type="text" class="form-control {{ $errors->has('ship_address') ? 'error' : '' }}" name="ship_address" id="ship_address" value="{{ old('ship_address') }}">

					<!-- Error -->
					@if ($errors->has('ship_address'))
					<div class="error">
							{{ $errors->first('ship_address') }}
					</div>
					@endif
			</div>
			<div class="form-group">
					<label>ship_city</label>
					<input type="text" class="form-control {{ $errors->has('ship_city') ? 'error' : '' }}" name="ship_city" id="ship_city" value="{{ old('ship_city') }}">

					<!-- Error -->
					@if ($errors->has('ship_city'))
					<div class="error">
							{{ $errors->first('ship_city') }}
					</div>
					@endif
			</div>
			<div class="form-group">
					<label>ship_region</label>
					<input type="text" class="form-control {{ $errors->has('ship_region') ? 'error' : '' }}" name="ship_region" id="ship_region" value="{{ old('ship_region') }}">

					<!-- Error -->
					@if ($errors->has('ship_region'))
					<div class="error">
							{{ $errors->first('ship_region') }}
					</div>
					@endif
			</div>
			<div class="form-group">
					<label>ship_postal_code</label>
					<input type="text" class="form-control {{ $errors->has('ship_postal_code') ? 'error' : '' }}" name="ship_postal_code" id="ship_postal_code" value="{{ old('ship_postal_code') }}">

					<!-- Error -->
					@if ($errors->has('ship_postal_code'))
					<div class="error">
							{{ $errors->first('ship_postal_code') }}
					</div>
					@endif
			</div>
			<div class="form-group">
					<label>ship_country</label>
					<input type="text" class="form-control {{ $errors->has('ship_country') ? 'error' : '' }}" name="ship_country" id="ship_country" value="{{ old('ship_country') }}">

					<!-- Error -->
					@if ($errors->has('ship_country'))
					<div class="error">
							{{ $errors->first('ship_country') }}
					</div>
					@endif
			</div>

			<div class="text-center">
				<button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
			</div>
		</form>
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