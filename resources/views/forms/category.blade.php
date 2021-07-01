@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "category"
])
@endsection

@section('content')
<div class="card mt-4">
  <div class="card-header text-center pt-4">
    <h5>Category Form</h5>
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
    <form role="form text-left" method="POST" enctype="multipart/form-data" action="{{ route('form.category.store') }}">
      @csrf
      <div class="form-group">
          <label>category_id</label>
          <input type="text" class="form-control {{ $errors->has('category_id') ? 'error' : '' }}" name="category_id" id="category_id" value="{{ old('category_id') }}">

          <!-- Error -->
          @if ($errors->has('category_id'))
          <div class="error">
              {{ $errors->first('category_id') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>category_name</label>
          <input type="text" class="form-control {{ $errors->has('category_name') ? 'error' : '' }}" name="category_name" id="category_name" value="{{ old('category_name') }}">

          <!-- Error -->
          @if ($errors->has('category_name'))
          <div class="error">
              {{ $errors->first('category_name') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>description</label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

          <!-- Error -->
          @if ($errors->has('description'))
          <div class="error">
              {{ $errors->first('description') }}
          </div>
          @endif
      </div>

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
          <label>picture</label>
          <input type="file" name="picture" id="picture" cols="30" rows="10" class="form-control {{ $errors->has('picture') ? 'error' : '' }}" value="{{ old('picture') }}">

          <!-- Error -->
          @if ($errors->has('picture'))
          <div class="error">
              {{ $errors->first('picture') }}
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

<!-- CREATE TABLE categories
(
	category_id int,
	category_name varchar(255),
	description varchar(255),
	picture bytea,
	PRIMARY KEY (category_id)
); -->