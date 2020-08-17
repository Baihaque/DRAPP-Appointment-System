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
        $data = Appointment::with(['user','doctor'])->paginate(50);
        return view('customer.reminder', compact('data'))->withData($data);
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

        $data = new Appointment();

        $data->user_id = $request->user_id;
        $data->doctor_id = $request->doctor_id;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->google_api = $request->google_api;
        $data->status = 1;

        $data->save();
        // return nya di buat jamet!!

    }

    public function show($id, Request $request) {
        $data = Appointment::findorFail($id);
        
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

        $data = Appointment::findorFail($request->id);

        // $data->user_id = $request->user_id;
        // $data->doctor_id = $request->doctor_id;
        $data->date = $request->date;
        $data->time = $request->time;
        // $data->google_api = $request->google_api;
        $data->status = $request->status;

        $data->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');

        //data 2
        $d2 = Appointment::findorFail($request->id);

        // $data->user_id = $request->user_id;
        // $data->doctor_id = $request->doctor_id;
        $d2->date = $request->date;
        $d2->time = $request->time;
        // $data->google_api = $request->google_api;
        $d2->status = $request->status;

        $d2->save();

        return redirect('/admin/appointments')->with('success', 'Successfully updated appointments.');
    }

    public function delete($id) {
        $data = Appointment::findorFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }

    //customer appointment
    public function customer_index() {
        $data = Doctor::select('name','id','specialism','picture')->get();
        
        return view('welcome', compact('data'));
    }
    public function customer_appointment() {
        $id = Auth::id();
        $data = Appointment::where('user_id',$id)->get();
        
        return view('customer.appointment.appointments', compact('data')); // bkin return page nya
    }
    public function customer_apply(Request $request){

        $request->validate([
            'doctor' => 'bail|numeric|required',
            'date' => 'bail|required',
            'time' => 'bail|required',
        ]);

        
        $data['appointment_date'] = $request->input('date');
        $data['appointment_time'] = $request->input('time');
        
        $doctor = Doctor::findorFail($request->input('doctor'));
        $data['doctor'] = $doctor;
    
        return view('customer.apply.index',compact('data'));
    }
    // store apply user masa ga dibuat kampanggggg
    function customer_store(Request $request) {
        $data = new Appointment();

        $data->user_id = Auth::id();
        $data->doctor_id = $request->doctor_id;
        $data->date = $request->date;
        $data->time = $request->time;

        // jangan lupa di-fix
        $data->google_api = 'test';
        $data->status = 1;
        $data->save();

        return redirect('/')->with('success', 'Successfully created appointment.');
    }
    public function customer_show($id){
        $data = Appointment::findorFail($id);

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

        $data = Appointment::findorFail($request->id);

        // $data->user_id = $request->user_id;
        $data->doctor_id = $request->doctor_id;
        $data->date = $request->date;
        $data->time = $request->time;
        // $data->google_api = $request->google_api;
        $data->status = 1;

        $data->save();

        return redirect('/appointments')->with('success', 'Successfully updated appointments.');
    }
    public function customer_delete($id) {
        $data = Appointment::findorFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Successfully deleted appointments.');
    }
}
