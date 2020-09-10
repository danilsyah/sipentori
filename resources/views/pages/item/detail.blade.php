@extends('layouts.admin')
@section('title','SIPENTORy - Items')
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
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Detail Item -<i> {{ $item->description }} ({{ $item->item_no }}) </i></h4>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="detail-basic-tab" data-toggle="tab" href="#detailTab" role="tab"
                            aria-controls="detailBasic" aria-selected="true">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gallery-basic-tab" data-toggle="tab" href="#galleryBasic" role="tab"
                            aria-controls="galleryBasic" aria-selected="false">Gallery</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="detailTab" role="tabpanel"
                        aria-labelledby="detail-basic-tab">
                        <div class="form-row">
                            <div class="form-group col-md-8 mb-3">
                                <label for="id">ID</label>
                                <input type="text" value="{{ $item->id }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <label for="item_no">Item No</label>
                                <input type="text" value="{{ $item->item_no}}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <label for="description">Description</label>
                                <input type="text" value="{{ $item->description }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <label for="categories">Category</label>
                                <input type="text" value="{{ $item->category->name }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <label for="unit">Unit</label>
                                <input type="text" value="{{ strtoupper($item->unit) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <label for="price">Price</label>
                                <input type="text" value="@currency($item->price)" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-8 mb-3">
                                <a href="{{ route('item.index') }}" class="btn btn-primary ripple m-1">Back</a>
                                <a href="{{ route('item.edit', $item->id) }}"
                                    class="btn btn-success ripple m-1">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="galleryBasic" role="tabpanel" aria-labelledby="gallery-basic-tab">
                        <section class="widget-card">
                            <div class="row">
                                @foreach ($item->galleries as $gallery)
                                <div class="col-lg-4 col-xl-4 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ url('storage/'.$gallery->image) }}" alt="gambar" class="d-block w-100 rounded">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
