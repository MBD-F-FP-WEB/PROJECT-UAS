@extends('layouts.form')

@section('content')
  <div class="row mt-lg-n10 mt-md-n11 mt-n10">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
      <div class="card z-index-0">
        <div class="card-header text-center pt-4">
          <h5>Register with</h5>
        </div>
        <div class="card-body">
          <!-- Success message -->
          @if(Session::has('success'))
          <div class="alert alert-success">
              {{Session::get('success')}}
          </div>  
          @endif
          <form role="form text-left">
            <div class="form-group">
                <label>employee_id</label>
                <select class="form-control" name="employee_id">
                  @foreach($employee_ids as $employee_id)
                  <option value="{{$employee_id}}">{{$employee_id}}</option>
                  @endforeach
                </select>

                <!-- Error -->
                @if ($errors->has('employee_id'))
                <div class="error">
                    {{ $errors->first('employee_id') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>territory_id</label>
                <select class="form-control" name="territory_id">
                  @foreach($territory_ids as $territory_id)
                  <option value="{{$territory_id}}">{{$territory_id}}</option>
                  @endforeach
                </select>

                <!-- Error -->
                @if ($errors->has('territory_id'))
                <div class="error">
                    {{ $errors->first('territory_id') }}
                </div>
                @endif
            </div>

            <div class="form-check form-check-info text-left">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
              <label class="form-check-label" for="flexCheckDefault">
                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
              </label>
            </div>
            <div class="text-center">
              <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
            </div>
            <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<!-- 
CREATE TABLE employee_territories
(
	employee_id int,
	territory_id varchar(255),
	CONSTRAINT fk_et_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employees(employee_id),
	CONSTRAINT fk_et_to_territory 
		FOREIGN KEY (territory_id) 
		REFERENCES territories(territory_id)
); -->