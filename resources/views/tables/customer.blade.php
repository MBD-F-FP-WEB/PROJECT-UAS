@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "customer",
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
        <h3>Customers Data</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Customer</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i>Customers</span>
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
          <table class="table align-items-center table-flush text-center " id="data-table" style="font-size: 12px">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="px-2">id</th>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Title</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Phone</th>
                <th scope="col">Fax</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
              <tr>
                <td class="px-4">
                  {{ $customer->customer_id }}
                </td>
                <td>
                  {{ $customer->company_name }} 
                </td>
                <td>
                  {{ $customer->contact_name }} 
                </td>
                <td>
                  {{ $customer->contact_title }}
                </td>
                <td class="text-wrap">
                  {{ $customer->address }}
                </td>
                <td class="text-wrap">
                  {{ $customer->city }}
                </td>
                <td>
                  {{ $customer->region }}
                </td>
                <td>
                  {{ $customer->phone }}
                </td> 
                <td class="text-wrap">
                  {{ $customer->fax }}
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalCustomerEdit-{{ $customer->customer_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalCustomerDelete-{{ $customer->customer_id }}">Hapus</button>
                </td>
              </tr>

              <div class="modal fade" id="modalCustomerDelete-{{ $customer->customer_id }}" tabindex="-1" aria-labelledby="modalCustomerDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCustomerDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.customer.delete', ['id'=>$customer->customer_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalCustomerEdit-{{ $customer->customer_id }}" tabindex="-1" aria-labelledby="modalCustomerEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCustomerEdit">Edit customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.customer.update', $customer->customer_id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label>Customer Id</label>
                          <input type="text" class="form-control {{ $errors->has('customer_id') ? 'error' : '' }}" name="customer_id" id="customer_id" value="{{ $customer->customer_id }}">
                
                          <!-- Error -->
                          @if ($errors->has('customer_id'))
                          <div class="error">
                              {{ $errors->first('customer_id') }}
                          </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control {{ $errors->has('company_name') ? 'error' : '' }}" name="company_name" id="company_name" value="{{ $customer->company_name }}">
                  
                            <!-- Error -->
                            @if ($errors->has('company_name'))
                            <div class="error">
                                {{ $errors->first('company_name') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Contact Name</label>
                            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'error' : '' }}" name="contact_name" id="contact_name" value="{{ $customer->contact_name }}">
                  
                            <!-- Error -->
                            @if ($errors->has('contact_name'))
                            <div class="error">
                                {{ $errors->first('contact_name') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Contact Title</label>
                            <input type="text" class="form-control {{ $errors->has('contact_title') ? 'error' : '' }}" name="contact_title" id="contact_title" value="{{ $customer->contact_title }}">
                  
                            <!-- Error -->
                            @if ($errors->has('contact_title'))
                            <div class="error">
                                {{ $errors->first('contact_title') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{ $customer->address}}">
                  
                            <!-- Error -->
                            @if ($errors->has('address'))
                            <div class="error">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{ $customer->city }}">
                  
                            <!-- Error -->
                            @if ($errors->has('city'))
                            <div class="error">
                                {{ $errors->first('city') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Region</label>
                            <input type="text" class="form-control {{ $errors->has('region') ? 'error' : '' }}" name="region" id="region" value="{{ $customer->region }}">
                  
                            <!-- Error -->
                            @if ($errors->has('region'))
                            <div class="error">
                                {{ $errors->first('region') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" class="form-control {{ $errors->has('postal_code') ? 'error' : '' }}" name="postal_code" id="postal_code" value="{{ $customer->postal_code }}">
                  
                            <!-- Error -->
                            @if ($errors->has('postal_code'))
                            <div class="error">
                                {{ $errors->first('postal_code') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control {{ $errors->has('country') ? 'error' : '' }}" name="country" id="country" value="{{ $customer->country }}">
                  
                            <!-- Error -->
                            @if ($errors->has('country'))
                            <div class="error">
                                {{ $errors->first('country') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{ $customer->phone }}">
                  
                            <!-- Error -->
                            @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                  
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" class="form-control {{ $errors->has('fax') ? 'error' : '' }}" name="fax" id="fax" value="{{ $customer->fax }}">
                  
                            <!-- Error -->
                            @if ($errors->has('fax'))
                            <div class="error">
                                {{ $errors->first('fax') }}
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
  <div class="row mx-auto text-center">
    {{ $customers->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE customers
(
	customer_id varchar(255),
	company_name varchar(255),
	contact_name varchar(255),
	contact_title varchar(255),
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	phone varchar(255),
	fax varchar(255),
	PRIMARY KEY (customer_id)
); -->
