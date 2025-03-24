@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <p class="card-text display-4">{{ $total_product }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text display-4">{{ $total_order }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text display-4">{{ $total_user }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Revenue</h5>
                <p class="card-text display-4">${{ $total_revenue }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order Status</h5>
                <p>Processing: {{ $total_processing }}</p>
                <p>Delivered: {{ $total_delivered }}</p>
            </div>
        </div>
    </div>
</div>
@endsection