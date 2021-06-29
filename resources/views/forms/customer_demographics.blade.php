@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "customer_demographics"
])
@endsection

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "category"
])
@endsection

@section('content')
      <div class="card z-index-0">
        <div class="card-header text-center pt-4">
          <h5>Register with</h5>
        </div>
        <div class="card-body">
          <!-- Success message -->
          @if(Session::has('success'))
          <div class="alert alert-success">
              {{Session::get('success')}}
          </div>  
          @endif
          <form role="form text-left">
            <div class="form-group">
                <label>customer_type_id</label>
                <input type="text" class="form-control {{ $errors->has('customer_type_id') ? 'error' : '' }}" name="customer_type_id" id="customer_type_id" value="{{ old('customer_type_id') }}">

                <!-- Error -->
                @if ($errors->has('customer_type_id'))
                <div class="error">
                    {{ $errors->first('customer_type_id') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>customer_desc</label>
                <textarea name="customer_desc" id="customer_desc" cols="30" rows="10" class="form-control {{ $errors->has('customer_desc') ? 'error' : '' }}">{{ old('customer_desc') }}</textarea>

                <!-- Error -->
                @if ($errors->has('customer_desc'))
                <div class="error">
                    {{ $errors->first('customer_desc') }}
                </div>
                @endif
            </div>
            
            <div class="form-check form-check-info text-left">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
              <label class="form-check-label" for="flexCheckDefault">
                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
              </label>
            </div>
            <div class="text-center">
              <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
            </div>
            <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
          </form>
        </div>
      </div>
@endsection

@section('script')
<!-- 
CREATE TABLE customer_demographics
(
	customer_type_id varchar(255),
	customer_desc varchar(255),
	PRIMARY KEY (customer_type_id)
); -->