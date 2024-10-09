<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.admin-layouts')

@section('content')
<h1>Welcome to the Admin Dashboard</h1>
<p>You can manage your users, payments, bookings, and applications from this dashboard.</p>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Payments</h5>
                <p class="card-text">{{ $totalPayments }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <p class="card-text">{{ $totalBookings }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Applications</h5>
                <p class="card-text">{{ $totalApplications }}</p>
            </div>
        </div>
    </div>
</div>
@endsection