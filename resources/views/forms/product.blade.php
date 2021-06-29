@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "product"
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
                <label>product_name</label>
                <input type="text" class="form-control {{ $errors->has('product_name') ? 'error' : '' }}" name="product_name" id="product_name" value="{{ old('product_name') }}">

                <!-- Error -->
                @if ($errors->has('product_name'))
                <div class="error">
                    {{ $errors->first('product_name') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>supplier_id</label>
                <select class="form-control" name="supplier_id">
                  @foreach($supplier_ids as $supplier_id)
                  <option value="{{$supplier_id}}">{{$supplier_id}}</option>
                  @endforeach
                </select>

                <!-- Error -->
                @if ($errors->has('supplier_id'))
                <div class="error">
                    {{ $errors->first('supplier_id') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>category_id</label>
                <select class="form-control" name="category_id">
                  @foreach($category_ids as $category_id)
                  <option value="{{$category_id}}">{{$category_id}}</option>
                  @endforeach
                </select>

                <!-- Error -->
                @if ($errors->has('category_id'))
                <div class="error">
                    {{ $errors->first('category_id') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>quantity_per_unit</label>
                <input type="text" class="form-control {{ $errors->has('quantity_per_unit') ? 'error' : '' }}" name="quantity_per_unit" id="quantity_per_unit" value="{{ old('quantity_per_unit') }}">

                <!-- Error -->
                @if ($errors->has('quantity_per_unit'))
                <div class="error">
                    {{ $errors->first('quantity_per_unit') }}
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
                <label>units_in_stock</label>
                <input type="text" class="form-control {{ $errors->has('units_in_stock') ? 'error' : '' }}" name="units_in_stock" id="units_in_stock" value="{{ old('units_in_stock') }}">

                <!-- Error -->
                @if ($errors->has('units_in_stock'))
                <div class="error">
                    {{ $errors->first('units_in_stock') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>units_on_order</label>
                <input type="text" class="form-control {{ $errors->has('units_on_order') ? 'error' : '' }}" name="units_on_order" id="units_on_order" value="{{ old('units_on_order') }}">

                <!-- Error -->
                @if ($errors->has('units_on_order'))
                <div class="error">
                    {{ $errors->first('units_on_order') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>reorder_level</label>
                <input type="text" class="form-control {{ $errors->has('reorder_level') ? 'error' : '' }}" name="reorder_level" id="reorder_level" value="{{ old('reorder_level') }}">

                <!-- Error -->
                @if ($errors->has('reorder_level'))
                <div class="error">
                    {{ $errors->first('reorder_level') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>discontined</label>
                <input type="text" class="form-control {{ $errors->has('discontined') ? 'error' : '' }}" name="discontined" id="discontined" value="{{ old('discontined') }}">

                <!-- Error -->
                @if ($errors->has('discontined'))
                <div class="error">
                    {{ $errors->first('discontined') }}
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
CREATE TABLE products
(
	product_id int,
	product_name varchar(255),
	supplier_id int,
	category_id int,
	quantity_per_unit varchar(255),
	unit_price int,
	units_in_stock int,
	units_on_order int,
	reorder_level int,
	discontined int,
	PRIMARY KEY (product_id),
	CONSTRAINT fk_p_to_suppliers 
		FOREIGN KEY (supplier_id) 
		REFERENCES suppliers(supplier_id),
	CONSTRAINT fk_p_to_categories 
		FOREIGN KEY (category_id) 
		REFERENCES categories(category_id)
); -->