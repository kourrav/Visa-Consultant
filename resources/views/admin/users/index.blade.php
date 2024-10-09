<!-- resources/views/admin/users/index.blade.php -->
@extends('admin.admin-layouts')
@section('title', 'User Listing')

@section('content')
<h1>User Management</h1>
<!-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add New User</a> -->

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <!-- <th>Actions</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                <!-- <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td> -->
            </tr>
        @endforeach
    </tbody>
</table>
@endsection