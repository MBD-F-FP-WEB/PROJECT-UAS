@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "customer_customer_demo"
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
    <h5>Customer Customer Demo Form</h5>
  </div>
  <div class="card-body">
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>  
    @endif
    <form role="form text-left">
      <div class="form-group" method="POST" action="{{ route('form.customer_customer_demo.store') }}">
          <label>customer_id</label>
          <select class="form-control" name="customer_id">
            @foreach($customer_ids as $customer_id)
            <option value="{{$customer_id}}">{{$customer_id}}</option>
            @endforeach
            <option value="null"></option>
          </select>

          <!-- Error -->
          @if ($errors->has('customer_id'))
          <div class="error">
              {{ $errors->first('customer_id') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>customer_type_id</label>
          <select class="form-control" name="customer_type_id">
            @foreach($customer_type_ids as $customer_type_id)
            <option value="{{$customer_type_id}}">{{$customer_type_id}}</option>
            @endforeach
            <option value="null"></option>
          </select>

          <!-- Error -->
          @if ($errors->has('customer_type_id'))
          <div class="error">
              {{ $errors->first('customer_type_id') }}
          </div>
          @endif
      </div>

      <div class="text-center">
        <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
      </div>
      <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
    </form>
  </div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE customer_customer_demo
(
  id int,
	customer_id varchar(255),
	customer_type_id varchar(255),
  PRIMARY KEY (id),
	CONSTRAINT fk_ccd_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_ccd_to_customer_demographics 
		FOREIGN KEY (customer_type_id) 
		REFERENCES customer_demographics(customer_type_id)
); -->