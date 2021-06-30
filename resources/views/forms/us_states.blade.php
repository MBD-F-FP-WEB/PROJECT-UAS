@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "us_states"
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
          <label>state_name</label>
          <input type="text" class="form-control {{ $errors->has('state_name') ? 'error' : '' }}" name="state_name" id="state_name" value="{{ old('state_name') }}">

          <!-- Error -->
          @if ($errors->has('state_name'))
          <div class="error">
              {{ $errors->first('state_name') }}
          </div>
          @endif
      </div>
      <div class="form-group">
          <label>state_abbr</label>
          <input type="text" class="form-control {{ $errors->has('state_abbr') ? 'error' : '' }}" name="state_abbr" id="state_abbr" value="{{ old('state_abbr') }}">

          <!-- Error -->
          @if ($errors->has('state_abbr'))
          <div class="error">
              {{ $errors->first('state_abbr') }}
          </div>
          @endif
      </div>
      <div class="form-group">
          <label>state_region</label>
          <input type="text" class="form-control {{ $errors->has('state_region') ? 'error' : '' }}" name="state_region" id="state_region" value="{{ old('state_region') }}">

          <!-- Error -->
          @if ($errors->has('state_region'))
          <div class="error">
              {{ $errors->first('state_region') }}
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
CREATE TABLE us_states
(
	state_id int,
	state_name varchar(255),
	state_abbr varchar(255),
	state_region varchar(255),
	PRIMARY KEY (state_id)
); -->