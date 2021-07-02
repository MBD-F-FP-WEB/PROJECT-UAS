@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "territory"
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
    <h5>Territory Form</h5>
  </div>
  <div class="card-body">
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>  
    @endif
    <form role="form text-left" method="POST" action="{{ route('form.territory.store') }}">
      <div class="form-group">
          <label>territory_id</label>
          <input type="text" class="form-control {{ $errors->has('territory_id') ? 'error' : '' }}" name="territory_id" id="territory_id" value="{{ old('territory_id') }}">

          <!-- Error -->
          @if ($errors->has('territory_id'))
          <div class="error">
              {{ $errors->first('territory_id') }}
          </div>
          @endif
      </div>
      
      
      <div class="form-group">
          <label>territory_description</label>
          <textarea name="territory_description" id="territory_description" cols="30" rows="10" class="form-control {{ $errors->has('territory_description') ? 'error' : '' }}">{{ old('territory_description') }}</textarea>

          <!-- Error -->
          @if ($errors->has('territory_description'))
          <div class="error">
              {{ $errors->first('territory_description') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>region_id</label>
          <select class="form-control" name="region_id">
            @foreach($region_ids as $region_id)
            <option value="{{$region_id}}">{{$region_id}}</option>
            @endforeach
          </select>

          <!-- Error -->
          @if ($errors->has('region_id'))
          <div class="error">
              {{ $errors->first('region_id') }}
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
CREATE TABLE territories
(
	territory_id varchar(255),
	territory_description varchar(255),
	region_id int,
	PRIMARY KEY (territory_id),
	CONSTRAINT fk_t_to_region 
		FOREIGN KEY (region_id) 
		REFERENCES region(region_id)
); -->