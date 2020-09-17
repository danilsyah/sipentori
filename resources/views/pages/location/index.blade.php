@extends('layouts.admin')
@section('title','SIPENTORy - Locations')
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
          Locations
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="row mb-4">
  <div class="col-md-12 mb-4">
    <div class="card text-left">
      <div class="card-body">
        <div class="card-title mb-3">Locations List</div>
        <a href="{{ route('location.create') }}" class="btn btn-primary btn-rounded mb-1" style="width: 100%">+Add</a>
        <hr>
        <div class="table-responsive">
          <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Description</th>
                <th>PIC</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($locations as $location)
                  <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->kode }}</td>
                    <td>{{ $location->description }}</td>
                    <td>{{ $location->pic }}</td>
                    <td>
                      <a href="{{ route('location.edit', $location->id) }}" class="btn btn-outline-success">
                          Edit
                      </a>
                      <form action="{{ route('location.destroy', $location->id) }}" method="POST"
                          class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-outline-danger m-1 delete-confirm"
                              data-name="{{ $location->description }}">Delete</button>
                      </form>
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