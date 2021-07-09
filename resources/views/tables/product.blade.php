@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "product",
  'form' => ""
])
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger text-white">
    {{Session::get('error')}}
</div>
@endif
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="mb-4 w-25">
        
        <h3>Products Data</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-12 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i>Products</span>
            </div>
            <div class="col-lg-4 text-end my-auto">
              {{-- <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a> --}}
            </div>
          </div>
        </div>
        <div class="overflow-scroll">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center" id="data-table" style="font-size: 10px">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">supplier_id</th>
                <th scope="col">category_id</th>
                <th scope="col">quantity_per_unit</th>
                <th scope="col">unit_price</th>
                <th scope="col">units_in_stock</th>
                <th scope="col">units_on_order</th>
                <th scope="col">reorder_level</th>
                <th scope="col">discontined</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr class="text-center">
                <td>
                  {{ $product->product_id }}
                </td>
                <td class="text-wrap">
                  {{ $product->product_name }}
                </td>
                <td>
                  {{ $product->supplier_id }}
                </td>
                <td>
                  {{ $product->category_id }}
                </td>
                <td>
                  {{ $product->quantity_per_unit }}
                </td>
                <td>
                  {{ $product->unit_price }}
                </td>
                <td>
                  {{ $product->units_in_stock }}
                </td>
                <td>
                  {{ $product->units_on_order }}
                </td>
                <td>
                  {{ $product->reorder_level }}
                </td>
                <td>
                  {{ $product->discontined }}
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalproductEdit-{{ $product->product_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalproductDelete-{{ $product->product_id }}">Delete</button>
                </td>
              </tr>

              <div class="modal fade" id="modalproductDelete-{{ $product->product_id }}" tabindex="-1" aria-labelledby="modalproductDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalproductDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.product.delete', ['id'=>$product->product_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalproductEdit-{{ $product->product_id }}" tabindex="-1" aria-labelledby="modalproductEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalproductEdit">Edit product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.product.update', ['id'=>$product->product_id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>product_name</label>
                            <input type="text" class="form-control {{ $errors->has('product_name') ? 'error' : '' }}" name="product_name"
                                id="product_name" value="{{ $product->product_name }}">

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
                                <option value="null"></option>
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
                                <option value="null"></option>
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
                            <input type="text" class="form-control {{ $errors->has('quantity_per_unit') ? 'error' : '' }}"
                                name="quantity_per_unit" id="quantity_per_unit" value="{{ $product->quantity_per_unit }}">

                            <!-- Error -->
                            @if ($errors->has('quantity_per_unit'))
                            <div class="error">
                                {{ $errors->first('quantity_per_unit') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>unit_price</label>
                            <input type="text" class="form-control {{ $errors->has('unit_price') ? 'error' : '' }}" name="unit_price"
                                id="unit_price" value="{{ $product->unit_price }}">

                            <!-- Error -->
                            @if ($errors->has('unit_price'))
                            <div class="error">
                                {{ $errors->first('unit_price') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>units_in_stock</label>
                            <input type="text" class="form-control {{ $errors->has('units_in_stock') ? 'error' : '' }}"
                                name="units_in_stock" id="units_in_stock" value="{{ $product->units_in_stock }}">

                            <!-- Error -->
                            @if ($errors->has('units_in_stock'))
                            <div class="error">
                                {{ $errors->first('units_in_stock') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>units_on_order</label>
                            <input type="text" class="form-control {{ $errors->has('units_on_order') ? 'error' : '' }}"
                                name="units_on_order" id="units_on_order" value="{{ $product->units_on_order }}">

                            <!-- Error -->
                            @if ($errors->has('units_on_order'))
                            <div class="error">
                                {{ $errors->first('units_on_order') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>reorder_level</label>
                            <input type="text" class="form-control {{ $errors->has('reorder_level') ? 'error' : '' }}"
                                name="reorder_level" id="reorder_level" value="{{ $product->reorder_level }}">

                            <!-- Error -->
                            @if ($errors->has('reorder_level'))
                            <div class="error">
                                {{ $errors->first('reorder_level') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>discontined</label>
                            <input type="text" class="form-control {{ $errors->has('discontined') ? 'error' : '' }}" name="discontined"
                                id="discontined" value="{{ $product->discontined }}">

                            <!-- Error -->
                            @if ($errors->has('discontined'))
                            <div class="error">
                                {{ $errors->first('discontined') }}
                            </div>
                            @endif
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" data-bs-dismiss="modal">Submit</button>
                        </div>
                      </form>
										</div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End bootstrap marketplace -->
    </div>
  </div>
  <div class="row mx-auto">
    {{ $products->links() }}
  </div>
</div>
@endsection

@section('script')

<!-- CREATE TABLE products
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