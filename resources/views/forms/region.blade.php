@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "region"
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
    <h5>Region Form</h5>
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
          <label>Name</label>
          <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" value="{{ old('name') }}">

          <!-- Error -->
          @if ($errors->has('name'))
          <div class="error">
              {{ $errors->first('name') }}
          </div>
          @endif
      </div>
      <div class="form-group">
          <label>region_description</label>
          <textarea name="region_description" id="region_description" cols="30" rows="10" class="form-control {{ $errors->has('region_description') ? 'error' : '' }}">{{ old('region_description') }}</textarea>

          <!-- Error -->
          @if ($errors->has('region_description'))
          <div class="error">
              {{ $errors->first('region_description') }}
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

CREATE TABLE region
(
	region_id int,
	region_description varchar(255),
	PRIMARY KEY (region_id)
);