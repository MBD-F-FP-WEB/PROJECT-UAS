@extends('layouts.app')

@section('content')
<div class="container mt-5">
<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employeed</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tools</th>
        </tr>
      </thead>
      <tbody>
        {{-- {{dd($employee)}} --}}

        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                {{-- <img src="https://picsum.photos/100" class="avatar avatar-sm me-3"> --}}
                <h6>{{ $employee[0]->employee_id }}</h6>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs">{{ $employee[0]->title_of_courtesy }} {{ $employee[0]->first_name }} {{ $employee[0]->last_name }}</h6>
                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">{{ $employee[0]->title }}</p>
            <p class="text-xs text-secondary mb-0">Organization</p>
          </td>
          <td class="align-middle text-center text-sm">
            <span class="badge badge-sm badge-success">{{ $employee[0]->city }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">{{ $employee[0]->hire_date }}</span>
          </td>
          <td class="align-middle">
            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
            </a>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
</div>

@endsection

@section('script')