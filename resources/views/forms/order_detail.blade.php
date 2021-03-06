@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "order_detail"
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
    <h5>Order Detail Form</h5>
  </div>
  <div class="card-body">
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <form role="form text-left"  method="POST" action="{{ route('form.order_detail.store') }}">
      @csrf
      <div class="form-group">
          <label>order_id</label>
          <select class="form-control" name="order_id">
            @foreach($order_ids as $order_id)
            <option value="{{$order_id}}">{{$order_id}}</option>
            @endforeach
          </select>

          <!-- Error -->
          @if ($errors->has('order_id'))
          <div class="error">
              {{ $errors->first('order_id') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>product_id</label>
          <select class="form-control" name="product_id">
            @foreach($product_ids as $product_id)
            <option value="{{$product_id}}">{{$product_id}}</option>
            @endforeach
          </select>

          <!-- Error -->
          @if ($errors->has('product_id'))
          <div class="error">
              {{ $errors->first('product_id') }}
          </div>
          @endif
      </div>
      
      <div class="form-group">
          <label>unit_price</label>
          <input type="text" class="form-control {{ $errors->has('unit_price') ? 'error' : '' }}" name="unit_price" id="unit_price" value="{{ old('unit_price') }}">

          <!-- Error -->
          @if ($errors->has('unit_price'))
          <div class="error">
              {{ $errors->first('unit_price') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>quantity</label>
          <input type="text" class="form-control {{ $errors->has('quantity') ? 'error' : '' }}" name="quantity" id="quantity" value="{{ old('quantity') }}">

          <!-- Error -->
          @if ($errors->has('quantity'))
          <div class="error">
              {{ $errors->first('quantity') }}
          </div>
          @endif
      </div>

      <div class="form-group">
          <label>discount</label>
          <input type="text" class="form-control {{ $errors->has('discount') ? 'error' : '' }}" name="discount" id="discount" value="{{ old('discount') }}">

          <!-- Error -->
          @if ($errors->has('discount'))
          <div class="error">
              {{ $errors->first('discount') }}
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
); -->
