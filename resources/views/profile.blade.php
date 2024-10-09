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
            <!-- Profile Settings Card -->
            <div class="card">
                <div class="card-header">{{ __('Profile Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="name"
                                aria-describedby="fullNameHelp" placeholder="Enter your fullname"
                                value="{{ Auth::user()->name }}">
                            <small id="fullNameHelp" class="form-text text-muted">Your name may appear around here
                                where you are mentioned. You can change or remove it at any time.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="form-group small text-muted">
                            All of the fields on this page are optional and can be deleted at any time, and by
                            filling them out, you're giving us consent to share this data wherever your user profile
                            appears.
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <button type="reset" class="btn btn-light">Reset Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection