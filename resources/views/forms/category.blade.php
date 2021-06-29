@extends('layouts.form')

@section('content')
  <div class="row mt-lg-n10 mt-md-n11 mt-n10">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
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
          <form role="form text-left" method="POST" enctype="multipart/form-data">
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