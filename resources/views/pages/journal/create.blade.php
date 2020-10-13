@extends('layouts.admin')
@section('title','SIPENTORy - Journal Create')
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
                <div class="card-title mb-3">Create Journal</div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <form action="{{ route('journal.store') }}" method="POST">
                    @csrf
                    <div class="form-row">             
                        <div class="form-group col-md-8 mb-3">
                          <label for="code">Journal Number</label>
                          <input type="text" name="code"
                              class="form-control @error('code') is-invalid @enderror" id="code"
                              required value="{{ $code}}" readonly>
                          @error('code')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="request_name">Request</label>
                            <input type="text" name="request_name" class="form-control @error('request_name') is-invalid @enderror" placeholder="Enter request name...">
                            @error('request_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="issue_name">Issue</label>
                            <input type="text" name="issue_name" id="issue_name" class="form-control @error('issue_name') is-invalid @enderror" placeholder="Enter issue name...">
                            @error('issue_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('journal.index') }}" class="btn btn-danger m-1">Cancel</a>
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
