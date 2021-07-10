@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "employee",
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
<div class="container my-3">
  <div class="my-4 w-25">
    <h3>Employees Statistics</h3>
  </div>
  <div class="row">
    @foreach ($stats as $stat)
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5>{{$stat->last_name}}</h5>
          <p class="card-text">#{{$loop->iteration}} Most Orders Employee</p>
          <a href="#" class="btn btn-primary">{{$stat->juml}}</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="my-4 w-25">
    <h3>Employees Data</h3>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mx-auto">
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-4 text-start">
              {{-- <p class="lead text-dark pt-1 mb-0">Employee</p> --}}
            </div>
            <div class="col-lg-4 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i>Employees</span>
            </div>
            <div class="col-lg-4 text-end my-auto">
              {{-- <a href="../../presentation.html#pricing-soft-ui" class="text-primary icon-move-right">View All
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a> --}}
            </div>
          </div>
        </div>
        
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

        <div class="overflow-scroll">
          <!-- Projects table -->
          <table class="table align-items-center table-flush text-center" id="data-table" style="font-size: 16px">
            <thead class="thead-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              <tr>
                <td>
                  {{ $employee->employee_id }}
                </td>
                <td class="text-wrap">
                  {{ $employee->title_of_courtesy }} {{ $employee->first_name }} {{ $employee->last_name }}
                </td>
                <td>
                  {{ $employee->title }}
                </td>
                <td class="text-wrap">
                  {{ $employee->city }}
                </td>
                <td class="text-wrap">
                  {{ $employee->country }}
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalEmployeeEdit-{{ $employee->employee_id }}">Edit</button>
                  <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalemployeeDelete-{{ $employee->employee_id }}">Hapus</button>
                </td>
              </tr>

              <div class="modal fade" id="modalemployeeDelete-{{ $employee->employee_id }}" tabindex="-1" aria-labelledby="modalemployeeDelete" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalemployeeDelete">Yakin Hapus?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-danger" href="{{ route('table.employee.delete', ['id'=>$employee->employee_id]) }}">Hapus</a>
										</div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalEmployeeEdit-{{ $employee->employee_id }}" tabindex="-1" aria-labelledby="modalEmployeeEdit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalEmployeeEdit">Edit Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                      <form role="form text-left" method="POST" enctype="multipart/form-data" action="{{ route('form.employee.update', $employee->employee_id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>last_name</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? 'error' : '' }}" name="last_name" id="last_name" value="{{ $employee->last_name ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('last_name'))
                            <div class="error">
                                {{ $errors->first('last_name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>first_name</label>
                            <input type="text" class="form-control {{ $errors->has('first_name') ? 'error' : '' }}" name="first_name" id="first_name" value="{{ $employee->first_name ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('first_name'))
                            <div class="error">
                                {{ $errors->first('first_name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'error' : '' }}" name="title" id="title" value="{{ $employee->title ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('title'))
                            <div class="error">
                                {{ $errors->first('title') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>title_of_courtesy</label>
                            <input type="text" class="form-control {{ $errors->has('title_of_courtesy') ? 'error' : '' }}" name="title_of_courtesy" id="title_of_courtesy" value="{{ $employee->title_of_courtesy ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('title_of_courtesy'))
                            <div class="error">
                                {{ $errors->first('title_of_courtesy') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>birth_date</label>
                            <input type="date" class="form-control {{ $errors->has('birth_date') ? 'error' : '' }}" name="birth_date" id="birth_date" value="{{ $employee->birth_date ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('birth_date'))
                            <div class="error">
                                {{ $errors->first('birth_date') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>hire_date</label>
                            <input type="date" class="form-control {{ $errors->has('hire_date') ? 'error' : '' }}" name="hire_date" id="hire_date" value="{{ $employee->hire_date ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('hire_date'))
                            <div class="error">
                                {{ $errors->first('hire_date') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>address</label>
                            <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{ $employee->address ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('address'))
                            <div class="error">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>city</label>
                            <input type="text" class="form-control {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{ $employee->city ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('city'))
                            <div class="error">
                                {{ $errors->first('city') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>region</label>
                            <input type="text" class="form-control {{ $errors->has('region') ? 'error' : '' }}" name="region" id="region" value="{{ $employee->region ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('region'))
                            <div class="error">
                                {{ $errors->first('region') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>postal_code</label>
                            <input type="text" class="form-control {{ $errors->has('postal_code') ? 'error' : '' }}" name="postal_code" id="postal_code" value="{{ $employee->postal_code ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('postal_code'))
                            <div class="error">
                                {{ $errors->first('postal_code') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>country</label>
                            <input type="text" class="form-control {{ $errors->has('country') ? 'error' : '' }}" name="country" id="country" value="{{ $employee->country ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('country'))
                            <div class="error">
                                {{ $errors->first('country') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>home_phone</label>
                            <input type="text" class="form-control {{ $errors->has('home_phone') ? 'error' : '' }}" name="home_phone" id="home_phone" value="{{ $employee->home_phone ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('home_phone'))
                            <div class="error">
                                {{ $errors->first('home_phone') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>extension</label>
                            <input type="text" class="form-control {{ $errors->has('extension') ? 'error' : '' }}" name="extension" id="extension" value="{{ $employee->extension ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('extension'))
                            <div class="error">
                                {{ $errors->first('extension') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>picture</label>
                            <input type="file" name="picture" id="picture" cols="30" rows="10" class="form-control {{ $errors->has('picture') ? 'error' : '' }}" value="{{ $employee->picture ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('picture'))
                            <div class="error">
                                {{ $errors->first('picture') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>notes</label>
                            <textarea name="notes" id="notes" cols="30" rows="10" class="form-control {{ $errors->has('notes') ? 'error' : '' }}">{{ $employee->notes ?? "" }}</textarea>

                            <!-- Error -->
                            @if ($errors->has('notes'))
                            <div class="error">
                                {{ $errors->first('notes') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>reports_to</label>
                            <select class="form-control" name="reports_to">
                              @foreach($reports_tos as $reports_to)
                              @if ($reports_to == $employee->employee_id)
                              <option value="{{$reports_to}}" selected>{{$reports_to}}</option>
                              @else
                                <option value="{{$reports_to}}">{{$reports_to}}</option>
                              @endif
                              @endforeach
                            </select>

                            <!-- Error -->
                            @if ($errors->has('reports_to'))
                            <div class="error">
                                {{ $errors->first('reports_to') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>photo_path</label>
                            <input type="text" class="form-control {{ $errors->has('photo_path') ? 'error' : '' }}" name="photo_path" id="photo_path" value="{{ $employee->photo_path ?? "" }}">

                            <!-- Error -->
                            @if ($errors->has('photo_path'))
                            <div class="error">
                                {{ $errors->first('photo_path') }}
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
    {{ $employees->links() }}
  </div>
</div>
@endsection

@section('script')