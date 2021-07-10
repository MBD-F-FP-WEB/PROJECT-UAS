
<div class="form-group">
  <label>Total Price Before Discount</label>
  <input type="number"
        class="form-control disable"
        name="pricepredisc" id="pricepredisc" value="{{ $order->ship_postal_code }}">
</div>
<div class="form-group">
  <label>Total Price After Discount</label>
  <input type="number"
        class="form-control disable"
        name="pricepascadisc" id="pricepascadisc" value="{{ $order->ship_postal_code }}">
</div>



------------------
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Product</p>
            <h5 class="font-weight-bolder mb-0">
              {{$product}}
            </h5>
          </div>
        </div>
        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Employee</p>
            <h5 class="font-weight-bolder mb-0">
              {{$employee}}
            </h5>
          </div>
        </div>
        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Customer</p>
            <h5 class="font-weight-bolder mb-0">
              {{$customer}}
            </h5>
          </div>
        </div>
        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-sm-6">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales Order</p>
            <h5 class="font-weight-bolder mb-0">
              {{$order}}
            </h5>
          </div>
        </div>
        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

----

<div class="card mb-4">
  <div class="card-header pb-0">
    <h6>Todays Statistic</h6>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0">
        <thead>
          <tr class="text-center">
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Table</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">Employee</h6>
                  <p class="text-xs text-secondary mb-0">description</p>
                </div>
              </div>
            </td>
            <td class="text-center text-sm">
              <div class="badge badge-sm bg-gradient-success text-center">108</div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Online</p>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
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