@extends('admin.admin-layouts')
@section('title', 'Bookings')

@section('content')
<h1>Bookings</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Service</th>
            <th>Status</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->user->name }}</td>
                <td>{{ $application->service->name }}</td>
                <td>{{ $application->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection