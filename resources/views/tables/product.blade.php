@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "product",
  'form' => ""
])
@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="mb-4 w-25">
        
        <h3>Products Data</h3>
      </div>
      <!-- Else bootstrap marketplace -->
      
      <div class="position-relative border-radius-xl shadow-lg mb-7">
        <div class="container border-bottom">
          <div class="row py-3">
            <div class="col-lg-12 mt-1 text-center">
              <span class="badge bg-light text-dark"><i class="fas fa-lock me-1" aria-hidden="true"></i>Products</span>
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
          <table class="table align-items-center table-flush text-center" id="data-table" style="font-size: 10px">
            <thead class="thead-light">
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">supplier_id</th>
                <th scope="col">category_id</th>
                <th scope="col">quantity_per_unit</th>
                <th scope="col">unit_price</th>
                <th scope="col">units_in_stock</th>
                <th scope="col">units_on_order</th>
                <th scope="col">reorder_level</th>
                <th scope="col">discontined</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr class="text-center">
                <td>
                  {{ $product->product_id }}
                </td>
                <td class="text-wrap">
                  {{ $product->product_name }}
                </td>
                <td>
                  {{ $product->supplier_id }}
                </td>
                <td>
                  {{ $product->category_id }}
                </td>
                <td>
                  {{ $product->quantity_per_unit }}
                </td>
                <td>
                  {{ $product->unit_price }}
                </td>
                <td>
                  {{ $product->units_in_stock }}
                </td>
                <td>
                  {{ $product->units_on_order }}
                </td>
                <td>
                  {{ $product->reorder_level }}
                </td>
                <td>
                  {{ $product->discontined }}
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
    {{ $products->links() }}
  </div>
</div>
@endsection

@section('script')

<!-- CREATE TABLE products
(
	product_id int,
	product_name varchar(255),
	supplier_id int,
	category_id int,
	quantity_per_unit varchar(255),
	unit_price int,
	units_in_stock int,
	units_on_order int,
	reorder_level int,
	discontined int,
	PRIMARY KEY (product_id),
	CONSTRAINT fk_p_to_suppliers 
		FOREIGN KEY (supplier_id) 
		REFERENCES suppliers(supplier_id),
	CONSTRAINT fk_p_to_categories 
		FOREIGN KEY (category_id) 
		REFERENCES categories(category_id)
); -->