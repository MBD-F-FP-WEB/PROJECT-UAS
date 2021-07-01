@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "customer"
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
		<h5>Customer Form</h5>
	</div>
	<div class="card-body">
		<!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-danger text-white">
        {{Session::get('error')}}
    </div>
    @endif

		<form role="form text-left" method="POST" enctype="multipart/form-data" action="{{ route('form.customer.store') }}">
			@csrf
			<div class="form-group">
					<label>customer_id</label>
					<input type="text" class="form-control {{ $errors->has('customer_id') ? 'error' : '' }}" name="customer_id" id="customer_id" value="{{ old('customer_id') }}">

					<!-- Error -->
					@if ($errors->has('customer_id'))
					<div class="error">
							{{ $errors->first('customer_id') }}
					</div>
					@endif
			</div>
			
			<div class="form-group">
					<label>company_name</label>
					<input type="text" class="form-control {{ $errors->has('company_name') ? 'error' : '' }}" name="company_name" id="company_name" value="{{ old('company_name') }}">

					<!-- Error -->
					@if ($errors->has('company_name'))
					<div class="error">
							{{ $errors->first('company_name') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>contact_name</label>
					<input type="text" class="form-control {{ $errors->has('contact_name') ? 'error' : '' }}" name="contact_name" id="contact_name" value="{{ old('contact_name') }}">

					<!-- Error -->
					@if ($errors->has('contact_name'))
					<div class="error">
							{{ $errors->first('contact_name') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>contact_title</label>
					<input type="text" class="form-control {{ $errors->has('contact_title') ? 'error' : '' }}" name="contact_title" id="contact_title" value="{{ old('contact_title') }}">

					<!-- Error -->
					@if ($errors->has('contact_title'))
					<div class="error">
							{{ $errors->first('contact_title') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>address</label>
					<input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{ old('address') }}">

					<!-- Error -->
					@if ($errors->has('address'))
					<div class="error">
							{{ $errors->first('address') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>city</label>
					<input type="text" class="form-control {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{ old('city') }}">

					<!-- Error -->
					@if ($errors->has('city'))
					<div class="error">
							{{ $errors->first('city') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>region</label>
					<input type="text" class="form-control {{ $errors->has('region') ? 'error' : '' }}" name="region" id="region" value="{{ old('region') }}">

					<!-- Error -->
					@if ($errors->has('region'))
					<div class="error">
							{{ $errors->first('region') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>postal_code</label>
					<input type="text" class="form-control {{ $errors->has('postal_code') ? 'error' : '' }}" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">

					<!-- Error -->
					@if ($errors->has('postal_code'))
					<div class="error">
							{{ $errors->first('postal_code') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>country</label>
					<input type="text" class="form-control {{ $errors->has('country') ? 'error' : '' }}" name="country" id="country" value="{{ old('country') }}">

					<!-- Error -->
					@if ($errors->has('country'))
					<div class="error">
							{{ $errors->first('country') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>phone</label>
					<input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{ old('phone') }}">

					<!-- Error -->
					@if ($errors->has('phone'))
					<div class="error">
							{{ $errors->first('phone') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>fax</label>
					<input type="text" class="form-control {{ $errors->has('fax') ? 'error' : '' }}" name="fax" id="fax" value="{{ old('fax') }}">

					<!-- Error -->
					@if ($errors->has('fax'))
					<div class="error">
							{{ $errors->first('fax') }}
					</div>
					@endif
			</div>

			<div class="text-center">
				<button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
			</div>
		</form>
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