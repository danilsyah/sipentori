@extends('layouts.admin')
@section('title','SIPENTORy - Orders')
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
                    Orders
                </li>
                <li class="breadcrumb-item active">
                    Edit
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Edit Order No : {{ $order->code }}</div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <form action="{{ route('order.update', $order->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="locations_id">From Area</label>
                            <select name="locations_id" id="locations_id" required
                                class="form-control select-single @error('locations_id') is-invalid @enderror">
                                <option value="{{ $order->locations_id }}">({{ $order->location->kode }}) - {{ $order->location->description }}</option>
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
                          <label for="code">Order Number</label>
                          <input type="text" name="code"
                              class="form-control @error('code') is-invalid @enderror" id="code"
                              placeholder="Enter order number" required value="{{ $order->code }}">
                          @error('code')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control @error('note') is-invalid @enderror" >{{ $order->note }}</textarea>
                            @error('note')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                          <label for="attach">Attachment</label>
                          <input type="file" name="attachment" id="attach" class="form-control @error('attachment') is-invalid @enderror" value="{{ $order->attachment }}">
                          @error('attachment')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('order.index') }}" class="btn btn-danger m-1">Cancel</a>
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
