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
                <div class="card-title mb-3">Create Item</div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <form action="{{ route('item.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="categories_id">Category</label>
                            <select name="categories_id" id="categories_id" required
                                class="form-control form-control-rounded @error('categories_id') is-invalid @enderror">
                                <option value="">-Select-</option>
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
                                class="form-control form-control-rounded @error('item_no') is-invalid @enderror" id="item_no"
                                placeholder="Enter Item No" required value="{{ old('item_no') }}">
                            @error('item_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description"
                                class="form-control form-control-rounded @error('description') is-invalid @enderror"
                                id="description" placeholder="Enter description item" required
                                value="{{ old('description') }}">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" class="form-control form-control-rounded @error('unit') is-invalid @enderror" required>
                                <option value="">-Select-</option>
                                <option value="pcs">PCS</option>
                                <option value="meter">Meter</option>
                                <option value="cm">CM</option>
                                <option value="unit">Unit</option>
                                <option value="box">BOX</option>
                                <option value="roll">Roll</option>
                            </select>
                            @error('unit')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="price">Price Rp.</label>
                            <input type="number" id="price" name="price" class="form-control form-control-rounded @error('price') is-invalid @enderror" placeholder="Enter price">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('item.index') }}" class="btn btn-danger m-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
