@extends('layouts.app')

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
        

        <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
          <div class="container border-bottom">
            <div class="row py-3">
              <div class="col-lg-4 text-start">
                <p class="lead text-dark pt-1 mb-0">Employee</p>
              </div>
              <div class="col-lg-4 mt-1 text-center">
                <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i> Screenshot</span>
              </div>
              <div class="col-lg-4 text-end my-auto">
                <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div>
            <!-- Projects table -->
						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<tr>
									<th scope="col">id</th>
                  <th scope="col">Name</th>
									<th scope="col">Title</th>
									<th scope="col">City</th>
                  <th scope="col">Country</th>
								</tr>
							</thead>
							<tbody>
                @foreach($employees as $employee)
								<tr>
									<td>
										{{ $employee->employee_id }}
									</td>
                  <td>
                    {{ $employee->title_of_courtesy }} {{ $employee->first_name }} {{ $employee->last_name }}
									</td>
                  <td>
                    {{ $employee->title }}
									</td>
									<td>
                    {{ $employee->city }}
									</td>
									<td>
                    {{ $employee->country }}
									</td>
								</tr>
                @endforeach
							</tbody>
						</table>
          </div>
        </div>
        
        <!-- End bootstrap marketplace -->
      </div>
    </div>
  </div>
@endsection

@section('script')