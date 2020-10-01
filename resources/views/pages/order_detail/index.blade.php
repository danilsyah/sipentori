@extends('layouts.admin')
@section('title', 'SIPENTORy - Order')
@section('content')
<div class="breadcrumb">
  <h1>Datatables</h1>
  <ul>
      <li><a href="">UI Kits</a></li>
      <li>Datatables</li>
  </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Home
                </li>
                <li class="breadcrumb-item active">
                    Order Details
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row mb-4">
  <div class="col-md-12 mb-4">
    <div class="card text-left">
      <div class="card-body">
        <div class="card-title mb-3">Order Details</div>
        <hr>
        <div class="table-responsive">
          <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Description</th>
                <th>Serial Number</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>From</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orderDetails as $orderDetail)
                  <tr>
                    <td>{{ $orderDetail->id }}</td>
                    <td>{{ $orderDetail->order->code }}</td>
                    <td>{{ $orderDetail->item->description }}</td>
                    <td>{{ $orderDetail->serial_number }}</td>
                    <td>{{ $orderDetail->qty }}</td>
                    <td>{{ strtoupper($orderDetail->item->unit) }}</td>
                    <td>{{ $orderDetail->order->location->kode}}</td>
                    <td>
                      @if ($orderDetail->is_warehouse == true)
                      <span class="badge badge-pill badge-warning">Warehouse</span>
                      @else
                      <span class="badge badge-pill badge-danger">Out</span>
                      @endif
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('confirm-delete')
<script>
    $('.delete-confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
@endpush