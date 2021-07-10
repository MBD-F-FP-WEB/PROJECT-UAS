@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "order",
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
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="mb-4 w-25">
        <h3>Orders Data</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Employee</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i>Orders</span>
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
          <table class="table align-items-center table-flush" id="data-table" style="font-size: 9px;">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">customer_id</th>
                <th scope="col">order_date</th>
                <th scope="col">required_date</th>
                <th scope="col">shipped_date</th>
                <th scope="col">ship_via</th>
                <th scope="col">freight</th>
                <th scope="col">ship_name</th>
                <th scope="col">ship_address</th>
                <th scope="col">ship_city</th>
                <th scope="col">ship_region</th>
                <th scope="col">ship_postal_code</th>
                <th scope="col">ship_country</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              {{-- {{dd($order)}} --}}
              <tr class="text-center">
                <td>
                  {{ $order->order_id }}
                </td>
                <td>
                  {{ $order->customer_id }}
                </td>
                <td>
                  {{ $order->order_date }}
                </td>
                <td>
                  {{ $order->required_date }}
                </td>
                <td>
                  {{ $order->shipped_date }}
                </td>
                <td>
                  {{ $order->ship_via }}
                </td>
                <td>
                  {{ $order->freight }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_name }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_address }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_city }}
                </td>
                <td class="text-wrap">
                  {{ $order->ship_region }}
                </td>
                <td>
                  {{ $order->ship_postal_code }}
                </td>
                <td>
                  {{ $order->ship_country }}
                </td>
                <td>
                  <button class="btn btn-success p-2" type="button" data-bs-toggle="modal" data-bs-target="#modalorderEdit-{{ $order->order_id }}"><i class="bi-pencil"></i></button>
                  <button class="btn btn-danger p-2" type="button" data-bs-toggle="modal" data-bs-target="#modalorderDelete-{{ $order->order_id }}"><i class="bi-trash"></i></button>
                  <a href="{{route('table.orderperid', $order->order_id)}}">
                    <button class="btn btn-primary p-2" type="button"><i class="bi-eye"></i></button>
                  </a>
                </td>
              </tr>

              <div class="modal fade" id="modalorderDelete-{{ $order->order_id }}" tabindex="-1" aria-labelledby="modalorderDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalorderDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.order.delete', ['id'=>$order->order_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalorderEdit-{{ $order->order_id }}" tabindex="-1" aria-labelledby="modalorderEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalorderEdit">Edit order</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.order.update', ['id'=>$order->order_id]) }}">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group">
                            <label>customer_id</label>
                            <select class="form-control" name="customer_id">
                                @foreach($customer_ids as $customer_id)
                                <option value="{{$customer_id}}">{{$customer_id}}</option>
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
                            <label>employee_id</label>
                            <select class="form-control" name="employee_id">
                                @foreach($employee_ids as $employee_id)
                                <option value="{{$employee_id}}">{{$employee_id}}</option>
                                @endforeach
                                <option value="null"></option>
                            </select>

                            <!-- Error -->
                            @if ($errors->has('employee_id'))
                            <div class="error">
                                {{ $errors->first('employee_id') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>order_date</label>
                            <input type="date" class="form-control {{ $errors->has('order_date') ? 'error' : '' }}"
                                name="order_date" id="order_date" value="{{ $order->order_date }}">

                            <!-- Error -->
                            @if ($errors->has('order_date'))
                            <div class="error">
                                {{ $errors->first('order_date') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>required_date</label>
                            <input type="date" class="form-control {{ $errors->has('required_date') ? 'error' : '' }}"
                                name="required_date" id="required_date" value="{{ $order->required_date }}">

                            <!-- Error -->
                            @if ($errors->has('required_date'))
                            <div class="error">
                                {{ $errors->first('required_date') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>ship_via</label>
                            <select class="form-control" name="ship_via">
                              <option value="null"></option>
                              @foreach($shipper_ids as $shipper_id)
                              <option value="{{$shipper_id}}">{{$shipper_id}}</option>
                              @endforeach
                            </select>

                            <!-- Error -->
                            @if ($errors->has('shipper_id'))
                            <div class="error">
                                {{ $errors->first('shipper_id') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>shipped_date</label>
                            <input type="date" class="form-control {{ $errors->has('shipped_date') ? 'error' : '' }}"
                                name="shipped_date" id="shipped_date" value="{{ $order->shipped_date }}">

                            <!-- Error -->
                            @if ($errors->has('shipped_date'))
                            <div class="error">
                                {{ $errors->first('shipped_date') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>freight</label>
                            <input type="text" class="form-control {{ $errors->has('freight') ? 'error' : '' }}"
                                name="freight" id="freight" value="{{ $order->freight }}">

                            <!-- Error -->
                            @if ($errors->has('freight'))
                            <div class="error">
                                {{ $errors->first('freight') }}
                            </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>ship_name</label>
                            <input type="text" class="form-control {{ $errors->has('ship_name') ? 'error' : '' }}"
                                name="ship_name" id="ship_name" value="{{ $order->ship_name }}">

                            <!-- Error -->
                            @if ($errors->has('ship_name'))
                            <div class="error">
                                {{ $errors->first('ship_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ship_address</label>
                            <input type="text" class="form-control {{ $errors->has('ship_address') ? 'error' : '' }}"
                                name="ship_address" id="ship_address" value="{{ $order->ship_address }}">

                            <!-- Error -->
                            @if ($errors->has('ship_address'))
                            <div class="error">
                                {{ $errors->first('ship_address') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ship_city</label>
                            <input type="text" class="form-control {{ $errors->has('ship_city') ? 'error' : '' }}"
                                name="ship_city" id="ship_city" value="{{ $order->ship_city }}">

                            <!-- Error -->
                            @if ($errors->has('ship_city'))
                            <div class="error">
                                {{ $errors->first('ship_city') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ship_region</label>
                            <input type="text" class="form-control {{ $errors->has('ship_region') ? 'error' : '' }}"
                                name="ship_region" id="ship_region" value="{{ $order->ship_region }}">

                            <!-- Error -->
                            @if ($errors->has('ship_region'))
                            <div class="error">
                                {{ $errors->first('ship_region') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ship_postal_code</label>
                            <input type="text"
                                class="form-control {{ $errors->has('ship_postal_code') ? 'error' : '' }}"
                                name="ship_postal_code" id="ship_postal_code" value="{{ $order->ship_postal_code }}">

                            <!-- Error -->
                            @if ($errors->has('ship_postal_code'))
                            <div class="error">
                                {{ $errors->first('ship_postal_code') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ship_country</label>
                            <input type="text" class="form-control {{ $errors->has('ship_country') ? 'error' : '' }}"
                                name="ship_country" id="ship_country" value="{{ $order->ship_country }}">

                            <!-- Error -->
                            @if ($errors->has('ship_country'))
                            <div class="error">
                                {{ $errors->first('ship_country') }}
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
              {{-- @endforeach --}}
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End bootstrap marketplace -->
    </div>
  </div>
  <div class="row mx-auto text-center">
    {{ $orders->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE orders
(
	order_id int,
	customer_id varchar(255),
	employee_id int,
	order_date date,
	required_date date,
	shipped_date date,
	ship_via int,
	freight int,
	ship_name varchar(255),
	ship_address varchar(255),
	ship_city varchar(255),
	ship_region varchar(255),
	ship_postal_code varchar(255),
	ship_country varchar(255),
	PRIMARY KEY (order_id),
	CONSTRAINT fk_o_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_o_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employees(employee_id),
	CONSTRAINT fk_o_to_shippers 
		FOREIGN KEY (ship_via) 
		REFERENCES shippers(shipper_id)
); -->