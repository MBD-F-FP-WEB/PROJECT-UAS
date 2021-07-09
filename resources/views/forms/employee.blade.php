@extends('layouts.app')

@section('navbar')
@include('components.sidenav', [
  'active' => "forms",
  'form' => "employee"
])
@endsection

@section('content')
<div class="card mt-4 z-index-0">
	<div class="card-header text-center pt-4">
		<h5>Employee Form</h5>
	</div>
	<div class="card-body">
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

		<form role="form text-left"  method="POST" action="{{ route('form.employee.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
					<label>last_name</label>
					<input type="text" class="form-control {{ $errors->has('last_name') ? 'error' : '' }}" name="last_name" id="last_name" value="{{ old('last_name') }}">

					<!-- Error -->
					@if ($errors->has('last_name'))
					<div class="error">
							{{ $errors->first('last_name') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>first_name</label>
					<input type="text" class="form-control {{ $errors->has('first_name') ? 'error' : '' }}" name="first_name" id="first_name" value="{{ old('first_name') }}">

					<!-- Error -->
					@if ($errors->has('first_name'))
					<div class="error">
							{{ $errors->first('first_name') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>title</label>
					<input type="text" class="form-control {{ $errors->has('title') ? 'error' : '' }}" name="title" id="title" value="{{ old('title') }}">

					<!-- Error -->
					@if ($errors->has('title'))
					<div class="error">
							{{ $errors->first('title') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>title_of_courtesy</label>
					<input type="text" class="form-control {{ $errors->has('title_of_courtesy') ? 'error' : '' }}" name="title_of_courtesy" id="title_of_courtesy" value="{{ old('title_of_courtesy') }}">

					<!-- Error -->
					@if ($errors->has('title_of_courtesy'))
					<div class="error">
							{{ $errors->first('title_of_courtesy') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>birth_date</label>
					<input type="date" class="form-control {{ $errors->has('birth_date') ? 'error' : '' }}" name="birth_date" id="birth_date" value="{{ old('birth_date') }}">

					<!-- Error -->
					@if ($errors->has('birth_date'))
					<div class="error">
							{{ $errors->first('birth_date') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>hire_date</label>
					<input type="date" class="form-control {{ $errors->has('hire_date') ? 'error' : '' }}" name="hire_date" id="hire_date" value="{{ old('hire_date') }}">

					<!-- Error -->
					@if ($errors->has('hire_date'))
					<div class="error">
							{{ $errors->first('hire_date') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>address</label>
					<input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{ old('address') }}">

					<!-- Error -->
					@if ($errors->has('address'))
					<div class="error">
							{{ $errors->first('address') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>city</label>
					<input type="text" class="form-control {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{ old('city') }}">

					<!-- Error -->
					@if ($errors->has('city'))
					<div class="error">
							{{ $errors->first('city') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>region</label>
					<input type="text" class="form-control {{ $errors->has('region') ? 'error' : '' }}" name="region" id="region" value="{{ old('region') }}">

					<!-- Error -->
					@if ($errors->has('region'))
					<div class="error">
							{{ $errors->first('region') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>postal_code</label>
					<input type="text" class="form-control {{ $errors->has('postal_code') ? 'error' : '' }}" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">

					<!-- Error -->
					@if ($errors->has('postal_code'))
					<div class="error">
							{{ $errors->first('postal_code') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>country</label>
					<input type="text" class="form-control {{ $errors->has('country') ? 'error' : '' }}" name="country" id="country" value="{{ old('country') }}">

					<!-- Error -->
					@if ($errors->has('country'))
					<div class="error">
							{{ $errors->first('country') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>home_phone</label>
					<input type="text" class="form-control {{ $errors->has('home_phone') ? 'error' : '' }}" name="home_phone" id="home_phone" value="{{ old('home_phone') }}">

					<!-- Error -->
					@if ($errors->has('home_phone'))
					<div class="error">
							{{ $errors->first('home_phone') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>extension</label>
					<input type="text" class="form-control {{ $errors->has('extension') ? 'error' : '' }}" name="extension" id="extension" value="{{ old('extension') }}">

					<!-- Error -->
					@if ($errors->has('extension'))
					<div class="error">
							{{ $errors->first('extension') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>picture</label>
					<input type="file" name="picture" id="picture" cols="30" rows="10" class="form-control {{ $errors->has('picture') ? 'error' : '' }}" value="{{ old('picture') }}">

					<!-- Error -->
					@if ($errors->has('picture'))
					<div class="error">
							{{ $errors->first('picture') }}
					</div>
					@endif
			</div>

			<div class="form-group">
					<label>notes</label>
					<textarea name="notes" id="notes" cols="30" rows="10" class="form-control {{ $errors->has('notes') ? 'error' : '' }}">{{ old('notes') }}</textarea>

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
						<option value="{{$reports_to}}">{{$reports_to}}</option>
						@endforeach
            <option value="null"></option>
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
					<input type="text" class="form-control {{ $errors->has('photo_path') ? 'error' : '' }}" name="photo_path" id="photo_path" value="{{ old('photo_path') }}">

					<!-- Error -->
					@if ($errors->has('photo_path'))
					<div class="error">
							{{ $errors->first('photo_path') }}
					</div>
					@endif
			</div>

			<div class="text-center">
				<button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('script')
<!-- 
CREATE TABLE employees
(
	employee_id int,
	last_name varchar(255),
	first_name varchar(255),
	title varchar(255),
	title_of_courtesy varchar(255),
	birth_date date,
	hire_date date,
	address varchar(255),
	city varchar(255),
	region varchar(255),
	postal_code varchar(255),
	country varchar(255),
	home_phone varchar(255),
	extension varchar(255),
	photo bytea,
	notes text,
	reports_to int,
	photo_path varchar(255),
	PRIMARY KEY (employee_id),
	CONSTRAINT fk_e_to_employees 
		FOREIGN KEY (reports_to) 
		REFERENCES employees(employee_id)
); -->