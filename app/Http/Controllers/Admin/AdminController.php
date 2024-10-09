<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment; // Assume you have a Payment model
use App\Models\Booking; // Assume you have a Booking model
use App\Models\Application;
use App\Models\Eligibility;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPayments = Payment::count();
        $totalBookings = Booking::count();
        $totalApplications = Application::count();

        // Similarly, fetch other counts or data as needed
        return view('admin.dashboard', compact('totalUsers', 'totalPayments', 'totalBookings', 'totalApplications'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function payments()
    {
        $payments = Payment::with('user')->get();
        return view('admin.payments', compact('payments'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'service'])->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function applications()
    {
        $applications = Application::with('user')->get();
        return view('admin.applications', compact('applications'));
    }

    public function eligibilities()
    {
        $eligibilities = Eligibility::where('user_id', Auth::id())->get();
        return view('admin.applications', compact('applications'));
    }
}
