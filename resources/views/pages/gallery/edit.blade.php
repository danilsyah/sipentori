@extends('layouts.admin')
@section('title','SIPENTORy - Gallery')
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
                    Galleries
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
                <div class="card-title mb-3">Edit Gallery {{ $gallery->item->description }}</div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-8 mb-3">
                            <label for="items_id">Item Description</label>
                            <select name="items_id" id="items_id" required
                                class="form-control select-single form-control-rounded @error('items_id') is-invalid @enderror">
                                <option value="{{ $gallery->items_id }}">{{ $gallery->item->description }}</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                                @endforeach
                            </select>
                            @error('items_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group col-md-8 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" id="inputGroupFile01" aria-describedat="inputGroupFileAddon01" name="image" class="custom-file-input @error('image') is-invalid @enderror" placeholder="Enter image" required>
                                <label for="inputGroupFile01" class="custom-file-label">Choose File</label>
                            </div>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('gallery.index') }}" class="btn btn-danger m-1">Cancel</a>
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
