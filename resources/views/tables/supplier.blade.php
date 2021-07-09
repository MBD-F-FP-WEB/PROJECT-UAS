@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "supplier",
  'form' => ""
])
@endsection

@section('content')
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
<div class="container mt-5">
  <div class="my-4 w-25">
    <h3>Supplier Data</h3>
  </div>
  <div class="row">
    <div class="col-lg-12 mx-auto">      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Supplier</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i>Suppliers</span>
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
          <table class="table align-items-center table-flush" id="data-table">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">Supplier Id</th>
                <th scope="col">Company Name</th>
                <th scope="col">Contact Name</th>
                <th scope="col">Contact Title</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Country</th>
                <th scope="col">Phone</th>
                <th scope="col">Fax</th>
                <th scope="col">Homepage</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($suppliers as $supplier)
              <tr class="text-center">
                <td>
                  {{ $supplier->supplier_id }}
                </td>
                <td>
                  {{ $supplier->company_name }} 
                </td>
                <td>
                  {{ $supplier->contact_name }} 
                </td>
                <td>
                  {{ $supplier->contact_title }} 
                </td>
                <td>
                  {{ $supplier->address }} 
                </td>
                <td>
                  {{ $supplier->city }} 
                </td>
                <td>
                  {{ $supplier->region }} 
                </td>
                <td>
                  {{ $supplier->postal_code }} 
                </td>
                <td>
                  {{ $supplier->country }} 
                </td>
                <td>
                  {{ $supplier->phone }} 
                </td>
                <td>
                  {{ $supplier->fax }} 
                </td>
                <td>
                  {{ $supplier->homepage }} 
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalsupplierEdit-{{ $supplier->supplier_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalsupplierDelete-{{ $supplier->supplier_id }}">Hapus</button>
                </td>
              </tr>

              <div class="modal fade" id="modalsupplierDelete-{{ $supplier->supplier_id }}" tabindex="-1" aria-labelledby="modalsupplierDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalsupplierDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.supplier.delete', ['id'=>$supplier->supplier_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalsupplierEdit-{{ $supplier->supplier_id }}" tabindex="-1" aria-labelledby="modalsupplierEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalsupplierEdit">Edit supplier</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.supplier.update', $supplier->supplier_id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>company_name</label>
                            <input type="text" class="form-control {{ $errors->has('company_name') ? 'error' : '' }}" name="company_name" id="company_name" value="{{ $supplier->company_name }}">

                            <!-- Error -->
                            @if ($errors->has('company_name'))
                            <div class="error">
                                {{ $errors->first('company_name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>contact_name</label>
                            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'error' : '' }}" name="contact_name" id="contact_name" value="{{ $supplier->contact_name }}">

                            <!-- Error -->
                            @if ($errors->has('contact_name'))
                            <div class="error">
                                {{ $errors->first('contact_name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>contact_title</label>
                            <input type="text" class="form-control {{ $errors->has('contact_title') ? 'error' : '' }}" name="contact_title" id="contact_title" value="{{ $supplier->contact_title }}">

                            <!-- Error -->
                            @if ($errors->has('contact_title'))
                            <div class="error">
                                {{ $errors->first('contact_title') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>address</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{ $supplier->address }}">

                            <!-- Error -->
                            @if ($errors->has('address'))
                            <div class="error">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>city</label>
                            <input type="text" class="form-control {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{ $supplier->city }}">

                            <!-- Error -->
                            @if ($errors->has('city'))
                            <div class="error">
                                {{ $errors->first('city') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>region</label>
                            <input type="text" class="form-control {{ $errors->has('region') ? 'error' : '' }}" name="region" id="region" value="{{ $supplier->region }}">

                            <!-- Error -->
                            @if ($errors->has('region'))
                            <div class="error">
                                {{ $errors->first('region') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>postal_code</label>
                            <input type="text" class="form-control {{ $errors->has('postal_code') ? 'error' : '' }}" name="postal_code" id="postal_code" value="{{ $supplier->postal_code }}">

                            <!-- Error -->
                            @if ($errors->has('postal_code'))
                            <div class="error">
                                {{ $errors->first('postal_code') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>country</label>
                            <input type="text" class="form-control {{ $errors->has('country') ? 'error' : '' }}" name="country" id="country" value="{{ $supplier->country }}">

                            <!-- Error -->
                            @if ($errors->has('country'))
                            <div class="error">
                                {{ $errors->first('country') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{ $supplier->phone }}">

                            <!-- Error -->
                            @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>fax</label>
                            <input type="text" class="form-control {{ $errors->has('fax') ? 'error' : '' }}" name="fax" id="fax" value="{{ $supplier->fax }}">

                            <!-- Error -->
                            @if ($errors->has('fax'))
                            <div class="error">
                                {{ $errors->first('fax') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>homepage</label>
                            <input type="text" class="form-control {{ $errors->has('homepage') ? 'error' : '' }}" name="homepage" id="homepage" value="{{ $supplier->homepage }}">

                            <!-- Error -->
                            @if ($errors->has('homepage'))
                            <div class="error">
                                {{ $errors->first('homepage') }}
                            </div>
                            @endif
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
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
    {{ $suppliers->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- CREATE TABLE suppliers
(
	supplier_id int,
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
	homepage varchar(255),
	PRIMARY KEY (supplier_id)
); -->