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
                    <p class="text-primary text-24 line-height-1 mb-2">205</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Inbox-Into"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Item In</p>
                    <p class="text-primary text-24 line-height-1 mb-2">80</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Inbox-Out"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Item Out</p>
                    <p class="text-primary text-24 line-height-1 mb-2">10</p>
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
                    <p class="text-primary text-24 line-height-1 mb-2">10</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
