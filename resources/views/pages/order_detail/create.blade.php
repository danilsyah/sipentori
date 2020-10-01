@extends('layouts.admin')
@section('title','SIPENTORy - Add Item Order')
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
                    Order
                </li>
                <li class="breadcrumb-item active">
                    Order Detail
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Order No - <strong>{{ $order->code }}</strong></div>
                <div class="form-group col-md-12">
                    <hr>
                </div>

                <form action="{{ route('order-detail.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="orders_id" value="{{ $order->id }}">
                    <input type="hidden" name="is_warehouse" value="1">
                    <div id="add-row">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="items_id">Item</label>
                                <select name="items_id[]" id="items_id" required
                                    class="form-control select-single @error('items_id') is-invalid @enderror">
                                    <option value="">-Select-</option>
                                    @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->item_no }} -
                                        {{ $item->description }}</option>
                                    @endforeach
                                </select>
                                @error('items_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" name="serial_number[]"
                                    class="form-control @error('serial_number') is-invalid @enderror"
                                    placeholder="enter serial number" required>
                                @error('serial_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty[]"
                                    class="form-control @error('qty') is-invalid @enderror" placeholder="enter quantity"
                                    required>
                                @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="action">Action</label> <br>
                                <button class="btn btn-success" type="button" id="btn-tambah">Tambah</button>
                                <button class="btn btn-danger" type="button" id="btn-hapus">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <button style="width: 100%" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('multiple')
<script>
    $(document).ready(function () {
        $("#btn-tambah").on('click',function () {
            addRow();
        });
        $("#btn-hapus").click(function(){
            $("#hapus-row").remove();
        });
    });

    function addRow(){
        var row = '<div class="form-row" id="hapus-row">' +
        '<div class="col-md-4 mb-3">' +
        '<select name="items_id[]" id="items_id" required class="form-control select-single @error('items_id') is-invalid @enderror">' +
        ' <option value="">-Select-</option>' + 
        ' @foreach ($items as $item)' +
        '<option value="{{ $item->id }}">{{ $item->item_no }} - {{ $item->description }}</option>'+
        ' @endforeach' +
        '</select>'+
        '@error('items_id') <span class="text-danger">{{ $message }}</span> @enderror' +
        '</div>'+
        '<div class="col-md-3 mb-3">'+
        '<input type="text" name="serial_number[]"  class="form-control @error('serial_number') is-invalid @enderror" placeholder="enter serial number" required>'+
        '@error('serial_number')' +
        '<span class="text-danger">{{ $message }}</span>' +
        ' @enderror' +
        '</div>' +
        '<div class="col-md-3 mb-3">'+
        '<input type="number" name="qty[]" class="form-control @error('qty') is-invalid @enderror" placeholder="enter quantity" required>' +
        '@error('qty')'+
        '<span class="text-danger">{{ $message }}</span>'+
        '@enderror'+
        '</div>';
        $("#add-row").append(row);
    }

</script>
@endpush
@push('select2-autocompelete')
<script>
    $(document).ready(function () {
        $('.select-single').select2();
    });
</script>
@endpush
