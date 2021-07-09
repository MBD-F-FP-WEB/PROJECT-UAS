@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "shipper",
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
              <p class="lead text-dark pt-1 mb-0">Category</p>
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-user me-1" aria-hidden="true"></i> Data Category</span>
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
                <th scope="col">shipper_id</th>
                <th scope="col">company_name</th>
                <th scope="col">phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($shippers as $shipper)
              <tr>
                <td>
                  {{ $shipper->shipper_id }}
                </td>
                <td>
                  {{ $shipper->company_name }} 
                </td>
                <td class="text-wrap">
                  {{ $shipper->phone }} 
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalshipperEdit-{{ $shipper->shipper_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalshipperDelete-{{ $shipper->shipper_id }}">Hapus</button>
                </td>
              </tr>

              <div class="modal fade" id="modalshipperDelete-{{ $shipper->shipper_id }}" tabindex="-1" aria-labelledby="modalshipperDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalshipperDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.shipper.delete', ['id'=>$shipper->shipper_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalshipperEdit-{{ $shipper->shipper_id }}" tabindex="-1" aria-labelledby="modalshipperEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalshipperEdit">Edit shipper</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form text-left" method="POST" action="{{ route('form.shipper.update', $shipper->shipper_id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>company_name</label>
                            <input type="text" class="form-control {{ $errors->has('company_name') ? 'error' : '' }}" name="company_name" id="company_name" value="{{ $shipper->company_name ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('company_name'))
                            <div class="error">
                                {{ $errors->first('company_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{ $shipper->phone ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
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
    {{ $shippers->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
  CREATE TABLE shippers
(
	shipper_id int,
	company_name varchar(255),
	phone varchar(255),
	PRIMARY KEY (shipper_id)
);
 -->