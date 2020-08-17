<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Doctor;

class AppointmentController extends Controller
{
    public function index(){
        $lists = Appointment::with(['user','doctor'])->paginate(50);
        return view('admin.appointments.index',compact('lists'));
    }

    public function reminder_index() {
        $drem = Appointment::with(['user','doctor'])->paginate(50);
        return view('customer.reminder', compact('data'))->withData($drem);
    }

    public function create() {
        $lists = Appointment::with(['user','doctor'])->paginate(50);
        return view('admin.appointments.create', compact('lists'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'numeric|required',
            'doctor_id' => 'numeric|required',
            'date' => 'date_format:Y-m-d|required',
            'time' => 'date_format:H:i|required',
            'google_api'=> 'null',
        ]);

        $drem = new Appointment();

        $drem->user_id = $request->user_id;
        $drem->doctor_id = $request->doctor_id;
        $drem->date = $request->date;
        $drem->time = $request->time;
        $drem->google_api = $request->google_api;
        $drem->status = 1;

        $drem->save();
        // return nya di buat jamet!!

    }

    public function show($id, Request $request) {
        $drem = Appointment::findorFail($id);
        
        return view('admin.appointments.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            // 'user_id' => 'numeric|required',
            // 'doctor_id' => 'numeric|required',
            'date' => 'date_format:Y-m-d|required',
            'time' => 'date_format:H:i:s|required',
            // 'google_api'=> 'null',
        ]);

        $drem = Appointment::findorFail($request->id);

        // $drem->user_id = $request->user_id;
        // $drem->doctor_id = $request->doctor_id;
        $drem->date = $request->date;
        $drem->time = $request->time;
        // $drem->google_api = $request->google_api;
        $drem->status = $request->status;

        $drem->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');

        //data 2
        $d2 = Appointment::findorFail($request->id);

        // $drem->user_id = $request->user_id;
        // $drem->doctor_id = $request->doctor_id;
        $d2->date = $request->date;
        $d2->time = $request->time;
        // $drem->google_api = $request->google_api;
        $d2->status = $request->status;

        $d2->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');
    }

    public function delete($id) {
        $drem = Appointment::findorFail($id);
        $drem->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }

    //customer appointment
    public function customer_index() {
        $drem = Doctor::select('name','id','specialism','picture')->get();
        
        return view('welcome', compact('data'));
    }
    public function customer_appointment() {
        $id = Auth::id();
        $drem = Appointment::where('user_id',$id)->get();
        
        return view('customer.appointment.appointments', compact('data')); // bkin return page nya
    }
    public function customer_apply(Request $request){

        $request->validate([
            'doctor' => 'bail|numeric|required',
            'date' => 'bail|required',
            'time' => 'bail|required',
        ]);

        
        $drem['appointment_date'] = $request->input('date');
        $drem['appointment_time'] = $request->input('time');
        
        $doctor = Doctor::findorFail($request->input('doctor'));
        $drem['doctor'] = $doctor;
    
        return view('customer.apply.index',compact('data'));
    }
    // store apply user masa ga dibuat kampanggggg
    function customer_store(Request $request) {
        $drem = new Appointment();

        $drem->user_id = Auth::id();
        $drem->doctor_id = $request->doctor_id;
        $drem->date = $request->date;
        $drem->time = $request->time;

        // jangan lupa di-fix
        $drem->google_api = 'test';
        $drem->status = 1;
        $drem->save();

        return redirect('/')->with('success', 'Successfully created appointment.');
    }
    public function customer_show($id){
        $drem = Appointment::findorFail($id);

        return view('customer.appointment.edit',compact('data'));
        // return view nya di buat jameet setelah antum dah buat view nya
    }

    public function customer_update(Request $request){
        $request->validate([
            // 'user_id' => 'numeric|required',
            'doctor_id' => 'bail|numeric|required',
            'date' => 'bail|required',
            'time' => 'bail|required',
            // 'google_api'=> 'null',
        ]);

        $drem = Appointment::findorFail($request->id);

        // $drem->user_id = $request->user_id;
        $drem->doctor_id = $request->doctor_id;
        $drem->date = $request->date;
        $drem->time = $request->time;
        // $drem->google_api = $request->google_api;
        $drem->status = 1;

        $drem->save();

        return redirect('/appointments')->with('success', 'Successfully updated appointments.');
    }
    public function customer_delete($id) {
        $drem = Appointment::findorFail($id);
        $drem->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }
}
