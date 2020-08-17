<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('status',1)->count();
        $users_inactive = User::where('status',0)->count();
        $doctors = Doctor::where('status',1)->count();
        $doctors_inactive = Doctor::where('status',0)->count();
        $appointments = Appointment::where('status',1)->count();
        $appointments_inactive = Appointment::where('status',0)->count();

        return view('admin.dashboard.index', compact(['users', 'doctors', 'appointments','users_inactive','doctors_inactive', 'appointments_inactive']));
    }
}
