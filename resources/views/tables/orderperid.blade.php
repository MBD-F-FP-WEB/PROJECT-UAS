@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "order",
  'form' => ""
])
@endsection


@section('content')
<div class="row mx-auto">
  <div class="col-6 mx-auto">
    <div class="card mt-4 z-index-0">
      <div class="card-header text-center pt-4">
        <h5>Order Detail ID #{{$order->order_id}}</h5>
      </div>
      <div class="card-body"> 
        <div class="form-group">
          <label>Order Id</label>
          <input type="number" class="form-control" value="{{ $order->order_id }}">
        </div>
        <div class="form-group">
          <label>Customer Id</label>
          <input type="text" class="form-control" value="{{ $order->customer_id }}">
        </div>
        <div class="form-group">
          <label>Order Date</label>
          <input type="date" class="form-control" value="{{ $order->order_date }}">
        </div>
        <div class="form-group">
          <label>Required Date</label>
          <input type="date" class="form-control" value="{{ $order->required_date }}">
        </div>
        <div class="form-group">
          <label>Shipped Date</label>
          <input type="date" class="form-control" value="{{ $order->shipped_date }}">
        </div>
        <div class="form-group">
          <label>Ship Via</label>
          <input type="text" class="form-control" value="{{ $order->ship_via }}">
        </div>
        <div class="form-group">
          <label>Freight</label>
          <input type="number" class="form-control" value="{{ $order->freight}}">
        </div>
        <div class="form-group">
          <label>Ship Name</label>
          <input type="text" class="form-control" value="{{ $order->ship_name }}">
        </div>
        <div class="form-group">
          <label>Ship Address</label>
          <input type="text" class="form-control" value="{{ $order->ship_address }}">
        </div>
        <div class="form-group">
          <label>Ship City</label>
          <input type="text" class="form-control" value="{{ $order->ship_city }}">
        </div>
        <div class="form-group">
          <label>Ship Region</label>
          <input type="text" class="form-control" value="{{ $order->ship_region }}">
        </div>
        <div class="form-group">
          <label>Ship Postal Code</label>
          <input type="number" class="form-control" value="{{ $order->ship_name }}">
        </div>
        <div class="form-group">
          <label>Ship Country</label>
          <input type="text" class="form-control" value="{{ $order->ship_country }}">
        </div>

        <table class="table align-items-center table-flush text-sm" id="data-table">
          <thead class="thead-light">
            <tr class="">
              <th scope="col">Product Name</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Discount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($odets as $odet)
            <tr class="">
              <td>
                {{ $odet->product_name }} 
              </td>
              <td class="text-wrap">
                {{ $odet->unit_price }} 
              </td>
              <td class="text-wrap">
                {{ $odet->quantity }} 
              </td>
              <td class="text-wrap">
                {{ $odet->discount }} 
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Price </label>
              <div class="alert alert-warning font-weight-bold">
                ${{ $price->calc_total }}
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Discount </label>
              <div class="alert alert-primary font-weight-bold">
                ${{ $price->calc_total - $price->calc_diskon }}
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Price After Discount</label>
              <div class="alert alert-success font-weight-bold">
                ${{ $price->calc_diskon }}
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
          <a href="{{route('table.order')}}"><button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Back</button></a>
        </div>

      </div>
    </div>
</div>
</div>
@endsection

@section('script')