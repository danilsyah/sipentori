@extends('layouts.admin')
@section('title','SIPENTORy - Journal Detail')
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
				<li class="breadcrumb-item">
					Journals
				</li>
				<li class="breadcrumb-item active">
					Journal Detail
				</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">
					Items Journal - <strong><i>{{ $journal->code }}</i></strong>
					<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal"
						data-target="#showModal">Add Item</button>
				</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<div class="table-responsive">
					<table id="zero_configuration_table" class="display table table-striped table-bordered" style="width: 100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Item</th>
								<th>Serial Number</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($journal_details as $journal_detail)
							<tr>
								<td>{{ $journal_detail->id }}</td>
								<td>{{ $journal_detail->item->description }}</td>
								<td>{{ $journal_detail->serial_number }}</td>
								<td>{{ $journal_detail->qty }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Journal No - <strong>{{ $journal->code }}</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('journal-detail.store') }}" method="post">
					@csrf
					<input type="hidden" name="journals_id" value="{{ $journal->id }}">
					<div class="form-group">
						<label for="items_id">Item</label>
						<select name="items_id" id="items_id" required
							class="form-control select-single @error('items_id') is-invalid @enderror" style="width: 100%">
							<option id="" value="">-Select-</option>
							@foreach ($item_orders as $order)
							<option value="{{ $order->id }}">{{ $order->item_no }}#
								{{ $order->description }}#({{ $order->stock_total }})</option>
							@endforeach
						</select>
						@error('items_id')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="serial_number">Serial Number</label>
						<select name="serial_number" id="serial_number"
							class="form-control select-single @error('serial_number') is-invalid @enderror" style="width: 100%">
							<option value="-">-Select-</option>
						</select>
						@error('serial_number')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="qty">Quantity</label>
						<input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" required>
						@error('qty')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" name="note" id="note" class="form-control @error('note') is-invalid @enderror" required>
						@error('note')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<hr>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('select2-autocompelete')
<script>
	$(document).ready(function () {
        $('.select-single').select2();
    });
</script>
@endpush
@push('autoSerialNumber')
<script>
	$(document).ready(function () {
            $('#items_id').on('change', function (e) {
                var id = e.target.value;
                $.get('{{ url('show-serialnumber') }}/' + id,
                    function (data) {
                        console.log(id);
                        console.log(data);
                        $('#serial_number').empty();
                        $.each(data, function (serial_number, serial_number) {
                            $('#serial_number').append(new Option(serial_number,
                                serial_number));
                        });
                    });
            });
        });

</script>
@endpush
