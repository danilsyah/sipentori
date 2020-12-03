@extends('layouts.admin')
@section('title','SIPENTORy - Transfer Order')
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
					Transfer Order
				</li>
				<li class="breadcrumb-item active">
					Create
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-body">
				<div class="card-title mb-3">Create Transfer Order</div>
				<div class="form-group col-md-12">
					<hr>
				</div>
				<form action="{{ route('transfer-order.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="status" value="0">
					<div class="form-row">
						<div class="form-group col-md-8 mb-3">
							<label for="code">Transfer Number</label>
							<input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code"
								value="{{ $code }}" readonly>
							@error('code')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group col-md-8 mb-3">
							<label for="locations_id">From Area</label>
							<select name="locations_id" id="locations_id" required
								class="form-control select-single @error('locations_id') is-invalid @enderror">
								<option value="">-Select-</option>
								@foreach ($locations as $location)
								<option value="{{ $location->id }}">({{ $location->kode }}) -
									{{ $location->description }}</option>
								@endforeach
							</select>
							@error('locations_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-8 mb-3">
							<label for="note">Note</label>
							<textarea class="form-control @error('note') is-invalid @enderror" name="note" id="note" cols="10"
								rows="2" placeholder="Input note.."></textarea>
							@error('note')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-12">
							<hr>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="{{ route('transfer-order.index') }}" class="btn btn-danger m-1">Cancel</a>
						</div>
					</div>
				</form>
			</div>
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