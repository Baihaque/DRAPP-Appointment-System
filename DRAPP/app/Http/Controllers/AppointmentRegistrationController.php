<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Doctor;

class AppointmentRegistrationController extends Controller
{
    public function index(){
        $dreg = Appointment::with(['user','doctor'])->paginate(50);
        return view('customer.Registerappointment.index', compact('dreg'));
        //return view('customer.Registerappointment.index')->withData($dreg);
    }
    

    public function create() {
        $lists = Appointment::with(['user','doctor'])->paginate(50);
        return view('customer.Registerappointment.create', compact('lists'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'numeric|required',
            'doctor_id' => 'numeric|required',
            'date' => 'date_format:Y-m-d|required',
            'time' => 'date_format:H:i|required',
            'google_api'=> 'null',
        ]);

        $dreg = new Appointment();

        $dreg->user_id = $request->user_id;
        $dreg->doctor_id = $request->doctor_id;
        $dreg->date = $request->date;
        $dreg->time = $request->time;
        $dreg->google_api = $request->google_api;
        $dreg->status = 1;

        $dreg->save();
        // return nya di buat jamet!!

    }

    public function show($id, Request $request) {
        $dreg = Appointment::findorFail($id);
        
        return view('customer.Registerappointment.index', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            // 'user_id' => 'numeric|required',
            // 'doctor_id' => 'numeric|required',
            'date' => 'date_format:Y-m-d|required',
            'time' => 'date_format:H:i:s|required',
            // 'google_api'=> 'null',
        ]);

        $dreg = Appointment::findorFail($request->id);

        // $dreg->user_id = $request->user_id;
        // $dreg->doctor_id = $request->doctor_id;
        $dreg->date = $request->date;
        $dreg->time = $request->time;
        // $dreg->google_api = $request->google_api;
        $dreg->status = $request->status;

        $dreg->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');

        //data 2
        $d2 = Appointment::findorFail($request->id);

        // $dreg->user_id = $request->user_id;
        // $dreg->doctor_id = $request->doctor_id;
        $d2->date = $request->date;
        $d2->time = $request->time;
        // $dreg->google_api = $request->google_api;
        $d2->status = $request->status;

        $d2->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');
    }

    public function delete($id) {
        $dreg = Appointment::findorFail($id);
        $dreg->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }

    //customer appointment
    public function customer_index() {
        $dreg = Doctor::select('name','id','specialism','picture')->get();
        
        return view('welcome', compact('data'));
    }
    public function customer_appointment() {
        $id = Auth::id();
        $dreg = Appointment::where('user_id',$id)->get();
        
        return view('customer.appointment.appointments', compact('data')); // bkin return page nya
    }
    public function customer_apply(Request $request){

        $request->validate([
            'doctor' => 'bail|numeric|required',
            'date' => 'bail|required',
            'time' => 'bail|required',
        ]);

        
        $dreg['appointment_date'] = $request->input('date');
        $dreg['appointment_time'] = $request->input('time');
        
        $doctor = Doctor::findorFail($request->input('doctor'));
        $dreg['doctor'] = $doctor;
    
        return view('customer.apply.index',compact('data'));
    }
    // store apply user masa ga dibuat kampanggggg
    function customer_store(Request $request) {
        $dreg = new Appointment();

        $dreg->user_id = Auth::id();
        $dreg->doctor_id = $request->doctor_id;
        $dreg->date = $request->date;
        $dreg->time = $request->time;

        // jangan lupa di-fix
        $dreg->google_api = 'test';
        $dreg->status = 1;
        $dreg->save();

        return redirect('/')->with('success', 'Successfully created appointment.');
    }
    public function customer_show($id){
        $dreg = Appointment::findorFail($id);

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

        $dreg = Appointment::findorFail($request->id);

        // $dreg->user_id = $request->user_id;
        $dreg->doctor_id = $request->doctor_id;
        $dreg->date = $request->date;
        $dreg->time = $request->time;
        // $dreg->google_api = $request->google_api;
        $dreg->status = 1;

        $dreg->save();

        return redirect('/appointments')->with('success', 'Successfully updated appointments.');
    }
    public function customer_delete($id) {
        $dreg = Appointment::findorFail($id);
        $dreg->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }
}
