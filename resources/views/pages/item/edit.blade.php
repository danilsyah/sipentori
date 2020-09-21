@extends('layouts.admin')
@section('title','SIPENTORy - Item')
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
                    Items
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
                <div class="card-title mb-3">Edit Item - {{ $item->description }}</div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <form action="{{ route('item.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="categories_id">Category</label>
                            <select name="categories_id" id="categories_id" required
                                class="form-control select-single @error('categories_id') is-invalid @enderror">
                                <option value="{{ $item->categories_id }}">{{ strtoupper($item->category->name) }}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="item_no">No Item</label>
                            <input type="text" name="item_no"
                                class="form-control @error('item_no') is-invalid @enderror" id="item_no"
                                placeholder="Enter Item No" required value="{{ $item->item_no }}">
                            @error('item_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                id="description" placeholder="Enter description item" required
                                value="{{ $item->description }}">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="stok_min">Stok Min</label>
                            <input type="number" name="stok_min"
                                class="form-control @error('stok_min') is-invalid @enderror"
                                id="stok_min" placeholder="Enter stok minimum item" required
                                value="{{ $item->stok_min }}">
                            @error('stok_min')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" class="form-control select-single @error('unit') is-invalid @enderror" required>
                                <option value="{{ $item->unit }}">{{ strtoupper($item->unit) }}</option>
                                <option value="pcs">PCS</option>
                                <option value="meter">METER</option>
                                <option value="cm">CM</option>
                                <option value="unit">UNIT</option>
                                <option value="box">BOX</option>
                                <option value="roll">ROLL</option>
                            </select>
                            @error('unit')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="price">Price Rp.</label>
                            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price" value="{{ $item->price }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('item.index') }}" class="btn btn-danger m-1">Cancel</a>
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