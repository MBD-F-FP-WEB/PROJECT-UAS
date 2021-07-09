@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "shipper"
])
@endsection

@section('content')
<div class="card mt-4 z-index-0">
  <div class="card-header text-center pt-4">
    <h5>Shipper Form</h5>
  </div>
  <div class="card-body">
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>  
    @endif
    <form role="form text-left" method="POST" action="{{ route('form.shipper.store') }}">
      @csrf
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
          <label>phone</label>
          <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{ old('phone') }}">

          <!-- Error -->
          @if ($errors->has('phone'))
          <div class="error">
              {{ $errors->first('phone') }}
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
CREATE TABLE shippers
(
	shipper_id int,
	company_name varchar(255),
	phone varchar(255),
	PRIMARY KEY (shipper_id)
); -->