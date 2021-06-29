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
                <label>Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" value="{{ old('name') }}">

                <!-- Error -->
                @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
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

CREATE TABLE order_details
(
	order_id int,
	product_id int,
	unit_price int,
	quantity int,
	discount int,
	CONSTRAINT fk_od_to_orders 
		FOREIGN KEY (order_id) 
		REFERENCES orders(order_id),
	CONSTRAINT fk_od_to_products 
		FOREIGN KEY (product_id) 
		REFERENCES products(product_id)
);
