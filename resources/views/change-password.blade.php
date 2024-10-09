@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Display success or error messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Change Password Card -->
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body pb-2">
                    <form method="POST" action="{{ route('profile.updatePassword') }}">
                        @csrf

                        <div class="form-group">
                            <label for="current-password">{{ __('Current Password') }}</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                id="current-password" name="current_password" required>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new-password">{{ __('New Password') }}</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                id="new-password" name="new_password" required>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">{{ __('Confirm New Password') }}</label>
                            <input type="password"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                id="confirm-password" name="new_password_confirmation" required>
                            @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection