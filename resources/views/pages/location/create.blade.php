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
                <li class="breadcrumb-item">
                    Locations
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Create Location</div>
                <form action="{{ route('location.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="kode">Code</label>
                            <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Enter code location" required value="{{ old('kode') }}">
                            @error('kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter description" required value="{{ old('description') }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="pic">PIC Area</label>
                            <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" id="pic" placeholder="Enter pic" required value="{{ old('pic') }}">
                            @error('pic')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



