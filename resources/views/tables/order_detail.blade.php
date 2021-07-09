@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "order_detail",
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
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../presentation.html">Page Sections</a></li>
            <li class="breadcrumb-item active" aria-current="page">Features</li>
          </ol>
        </nav>
        <h3>Features</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              <p class="lead text-dark pt-1 mb-0">order_detail</p>
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i> Data order_detail</span>
            </div>
            <div class="col-lg-4 text-end my-auto">
              <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="overflow-scroll">
          <!-- Projects table -->
          <table class="table align-items-center table-flush" id="data-table">
            <thead class="thead-light">
              <tr>
                <th scope="col">order_id</th>
                <th scope="col">product_id</th>
                <th scope="col">unit_price</th>
                <th scope="col">quantity</th>
                <th scope="col">discount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order_details as $order_detail)
              <tr>
                <td>
                  {{ $order_detail->order_id }}
                </td>
                <td>
                  {{ $order_detail->product_id }} 
                </td>
                <td class="text-wrap">
                  {{ $order_detail->unit_price }} 
                </td>
                <td class="text-wrap">
                  {{ $order_detail->quantity }} 
                </td>
                <td class="text-wrap">
                  {{ $order_detail->discount }} 
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalorder_detailEdit-{{ $order_detail->order_id }}-{{ $order_detail->product_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalorder_detailDelete-{{ $order_detail->order_id }}-{{ $order_detail->product_id }}">Delete</button>
                </td>
              </tr>

              <div class="modal fade" id="modalorder_detailDelete-{{ $order_detail->order_id }}-{{ $order_detail->product_id }}" tabindex="-1" aria-labelledby="modalorder_detailDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalorder_detailDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.order_detail.delete', ['order_id'=>$order_detail->order_id, 'product_id'=>$order_detail->product_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalorder_detailEdit-{{ $order_detail->order_id }}-{{ $order_detail->product_id }}" tabindex="-1" aria-labelledby="modalorder_detailEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalorder_detailEdit">Edit order_detail</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.order_detail.update', ['order_id'=>$order_detail->order_id, 'product_id'=>$order_detail->product_id]) }}">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group">
                            <label>unit_price</label>
                            <input type="text" class="form-control {{ $errors->has('unit_price') ? 'error' : '' }}" name="unit_price" id="unit_price" value="{{ $order_detail->unit_price }}">

                            <!-- Error -->
                            @if ($errors->has('unit_price'))
                            <div class="error">
                                {{ $errors->first('unit_price') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>quantity</label>
                            <input type="text" class="form-control {{ $errors->has('quantity') ? 'error' : '' }}" name="quantity" id="quantity" value="{{ $order_detail->quantity }}">

                            <!-- Error -->
                            @if ($errors->has('quantity'))
                            <div class="error">
                                {{ $errors->first('quantity') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>discount</label>
                            <input type="text" class="form-control {{ $errors->has('discount') ? 'error' : '' }}" name="discount" id="discount" value="{{ $order_detail->discount }}">

                            <!-- Error -->
                            @if ($errors->has('discount'))
                            <div class="error">
                                {{ $errors->first('discount') }}
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
    {{ $order_details->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- order_detail
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
 -->