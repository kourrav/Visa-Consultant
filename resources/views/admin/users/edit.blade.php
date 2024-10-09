<!-- resources/views/admin/users/edit.blade.php -->
@extends('admin.admin-layouts')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"
            required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="is_admin">
            <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update User</button>
</form>
@endsection