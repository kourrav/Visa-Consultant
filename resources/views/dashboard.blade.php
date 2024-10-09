@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                        <a href="#check-eligibility" data-toggle="tab"
                            class="nav-item nav-link has-icon nav-link-faded active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user mr-2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>Check Eligibility
                        </a>
                        <a href="#booking-consultant" data-toggle="tab"
                            class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-settings mr-2">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                </path>
                            </svg>Booking Consultation
                        </a>
                        <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shield mr-2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>Security
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                        <li class="nav-item">
                            <a href="#check-eligibility" data-toggle="tab" class="nav-link has-icon active"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#booking-consultant" data-toggle="tab" class="nav-link has-icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shield">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="check-eligibility">
                        @include('eligibility-form.eligibility_form')   
                    </div>
                    <div class="tab-pane" id="booking-consultant">

                    </div>
                    <div class="tab-pane" id="security">
                        <div id="container" class="container mt-5">
                            <div class="main">
                                <form id="multistep_form">
                                    <!-- progressbar -->
                                    <ul id="progress_header">
                                        <li class="active"></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- Step 01 -->
                                    <div class="multistep-box">
                                        <div class="title-box">
                                            <h2>Create your account</h2>
                                        </div>
                                        <p>
                                            <input type="text" name="email" placeholder="Email" id="email">
                                            <span id="error-email"></span>
                                        </p>
                                        <p>
                                            <input type="password" name="pass" placeholder="Password" id="pass">
                                            <span id="error-pass"></span>
                                        </p>
                                        <p>
                                            <input type="password" name="cpass" placeholder="Confirm Password"
                                                id="cpass">
                                            <span id="error-cpass"></span>
                                        </p>
                                        <p class="nxt-prev-button"><input type="button" name="next"
                                                class="fs_next_btn action-button" value="Next" /></p>
                                    </div>
                                    <!-- Step 02 -->
                                    <div class="multistep-box">
                                        <div class="title-box">
                                            <h2>Social Profiles</h2>
                                        </div>
                                        <p>
                                            <input type="text" name="twitter" placeholder="Twitter" id="twitter">
                                            <span id="error-twitter"></span>
                                        </p>
                                        <p>
                                            <input type="text" name="facebook" placeholder="Facebook" id="facebook">
                                            <span id="error-facebook"></span>
                                        </p>
                                        <p>
                                            <input type="text" name="linkedin" placeholder="Linkedin" id="linkedin">
                                            <span id="error-linkedin"></span>
                                        </p>
                                        <p class="nxt-prev-button">
                                            <input type="button" name="previous" class="previous action-button"
                                                value="Previous" />
                                            <input type="button" name="next" class="ss_next_btn action-button"
                                                value="Next" />
                                        </p>
                                    </div>
                                    <!-- Step 03 -->
                                    <div class="multistep-box">
                                        <div class="title-box">
                                            <h2>Personal Details</h2>
                                        </div>
                                        <p>
                                            <input type="text" name="fname" placeholder="First Name" id="fname">
                                            <span id="error-fname"></span>
                                        </p>
                                        <p>
                                            <input type="text" name="lname" placeholder="Last Name" id="lname">
                                            <span id="error-lname"></span>
                                        </p>
                                        <p>
                                            <input type="text" name="phone" placeholder="Phone" id="phone">
                                            <span id="error-phone"></span>
                                        </p>
                                        <p>
                                            <textarea name="address" placeholder="Address" id="address"></textarea>
                                            <span id="error-address"></span>
                                        </p>
                                        <p class="nxt-prev-button"><input type="button" name="previous"
                                                class="previous action-button" value="Previous" />
                                            <input type="submit" name="submit"
                                                class="submit_btn ts_next_btn action-button" value="Submit" />
                                        </p>
                                    </div>
                                </form>
                                <h1>You are successfully logged in</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection