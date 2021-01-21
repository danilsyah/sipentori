@extends('layouts.admin')
@section('title','SIPENTORy - Dashboard')
@section('content')
<div class="breadcrumb">
	<h1 class="mr-2">Version 1</h1>
	<ul>
		<li><a href="">Dashboard</a></li>
		<li>Version 1</li>
	</ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
	<!-- ICON BG -->
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center">
				<i class="i-Box-Full"></i>
				<div class="content">
					<p class="text-muted mt-2 mb-0">Items</p>
					<p class="text-primary text-24 line-height-1 mb-2">{{ $jumlah_items }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center">
				<i class="i-Inbox-Into"></i>
				<div class="content">
					<p class="text-muted mt-2 mb-0">Orders</p>
					<p class="text-primary text-24 line-height-1 mb-2">{{ $jumlah_orders }}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center">
				<i class="i-Inbox-Out"></i>
				<div class="content">
					<p class="text-muted mt-2 mb-0">Journal</p>
					<p class="text-primary text-24 line-height-1 mb-2">0</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center">
				<i class="i-Dropbox"></i>
				<div class="content">
					<p class="text-muted mt-2 mb-0">Transfer</p>
					<p class="text-primary text-24 line-height-1 mb-2">0</p>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="row mb-4">
	<div class="col md-12 mb-4">
		<div class="card text-left">
			<div class="card-body">
				<div class="card-title mb-3">
					Stock Items
				</div>
				<hr>
				<div class="table-responsive">
					<table id="zero_configuration_table" class="display table table-striped table-bordered">
						<thead>
							<tr>
								<th>Item No</th>
								<th>Description</th>
								<th>Stock Min</th>
								<th>Stock Total</th>
								<th>Unit</th>
								<th>Category</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($stocks as $stock)
							<tr>
								<td>{{ $stock->item_no}}</td>
								<td>{{ $stock->description}}</td>
								<td>{{ $stock->stok_min }}</td>
								<td>{{ $stock->stock_total }}</td>
								<td>{{ $stock->unit}}</td>
								<td>{{ $stock->category}}</td>
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
