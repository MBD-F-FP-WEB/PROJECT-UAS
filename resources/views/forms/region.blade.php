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
    <form role="form text-left" method="POST" action="{{ route('form.region.store') }}">
    @csrf
      <div class="form-group">
          <label>Region Description</label>
          <textarea name="region_description" id="region_description" cols="30" rows="10" class="form-control {{ $errors->has('region_description') ? 'error' : '' }}">{{ old('region_description') }}</textarea>

          <!-- Error -->
          @if ($errors->has('region_description'))
          <div class="error">
              {{ $errors->first('region_description') }}
          </div>
          @endif
      </div>
      <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
      </div>
      <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
    </form>
  </div>
</div>
@endsection

@section('script')

{{-- CREATE TABLE region
(
	region_id int,
	region_description varchar(255),
	PRIMARY KEY (region_id)
); --}}