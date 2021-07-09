@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "category",
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
                <th scope="col">category_id</th>
                <th scope="col">category_name</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>
                  {{ $category->category_id }}
                </td>
                <td>
                  {{ $category->category_name }} 
                </td>
                <td class="text-wrap">
                  {{ $category->description }} 
                </td>
                <td>
                  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalCategoryEdit-{{ $category->category_id }}">Edit</button>
                  <a class="btn btn-danger" href="{{ route('table.category.delete', ['id'=>$category->category_id]) }}">Hapus</a>
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
  <div class="row mx-auto">
    {{ $categories->links() }}
  </div>
</div>
@endsection

@section('script')
<!-- CREATE TABLE categories
(
	category_id int,
	category_name varchar(255),
	description varchar(255),
	picture bytea,
	PRIMARY KEY (category_id)
); -->