@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "customer_customer_demo",
  'form' => ""
])
@endsection

@section('content')
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
                <th scope="col">id</th>
                <th scope="col">customer_id</th>
                <th scope="col">customer_type_id</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customer_customer_demos as $customer_customer_demo)
              <tr>
                <td>
                  {{ $customer_customer_demo->id }}
                </td>
                <td>
                  {{ $customer_customer_demo->customer_id }} 
                </td>
                <td class="text-wrap">
                  {{ $customer_customer_demo->customer_type_id }} 
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalCategoryEdit-{{ $category->category_id }}">Edit</button>
                  <button class="btn btn-danger">Hapus</button>
                </td>
              </tr>

							<div class="modal fade" id="modalEmployeeEdit-{{ $employee->employee_id }}" tabindex="-1" aria-labelledby="modalEmployeeEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalEmployeeEdit">Edit Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
										<form role="form text-left" method="POST" action="{{ route('form.employee.update', $employee->employee_id) }}">
                        @method('PUT')
                        @csrf
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
    {{ $categories->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- 
  CREATE TABLE customer_customer_demo
(
  id int,
	customer_id varchar(255),
	customer_type_id varchar(255),
  PRIMARY KEY (id),
	CONSTRAINT fk_ccd_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_ccd_to_customer_demographics 
		FOREIGN KEY (customer_type_id) 
		REFERENCES customer_demographics(customer_type_id)
);
 -->