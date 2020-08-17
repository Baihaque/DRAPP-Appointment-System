<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use File;


class DoctorController extends Controller
{

    //admin doctor
    public function index(){
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }
    public function store(Request $request){
     
        $request->validate([
            'name'=>'required|string',
            'specialism'=>'required|string',
            'picture'=>'required|image|mimes:jpeg,png,jpg',
            
            /* ini ga perlu validasi ya kampang kalau ga by input
            'status'=> 'required|integer', */
        ]);
        $extension = $request->picture->extension();
        $imageName = time().'.'. $extension;
        $path = $request->file('picture')->move(public_path('\upload_images'), $imageName);
        $doctors = new Doctor();
        $doctors->name = $request->name;
        $doctors->specialism = $request->specialism;
        $doctors->picture = $path->getfileName();
        $doctors->status = 1;
        $doctors->save();

        return redirect('/admin/doctors/')->with('success', 'Successfully added doctor.');
    }
    public function delete($id) {
        $doctor = Doctor::findorFail($id);
        $path1 = "upload_images/".$doctor->picture;
        if(File::exists(public_path($path1))){
            File::delete(public_path($path1));
        }
        $doctor->delete();
        

        return redirect()->back()->with('success', 'Successfully deleted doctor.');
    }
    public function update(Request $request) {
       
        $doctor = Doctor::findorFail($request->id);
        $path1 = "upload_images/".$doctor->picture;
        $request->validate([
            'name'=>'required|string',
            'specialism'=>'required|string',
            'picture'=>'image|mimes:jpeg,png,jpg',
            'status'=> 'required|integer',
        ]);
        if ($request->has('picture')){
            
            $extension = $request->picture->extension();
            $imageName = time().'.'. $extension;
            $path = $request->file('picture')->move(public_path('\upload_images'), $imageName);
            $doctor->name = $request->name;
            $doctor->specialism = $request->specialism;
            $doctor->status = $request->status;
            $doctor->pictue = $path->getfileName();
            $doctor->save();
            if(File::exists(public_path($path1))){
                File::delete(public_path($path1));
            }
        }else{
        $doctor->name = $request->name;
        $doctor->specialism = $request->specialism;
        $doctor->picture = $doctor->picture;
        $doctor->status = $request->status;
        $doctor->save();
    }

        return redirect('/admin/doctors')->with('success', 'Successfully updated doctor.');
    }
    public function create() {
        return view('admin.doctors.create');
    }
    public function show($id, Request $request) {
        $doctor = Doctor::findorFail($id);
        
        return view('admin.doctors.edit', compact('doctor'));
    }

    //controller customer
    public function customer_index(){
        $doctors = Doctor::paginate(10);
        // dd($doctors);
        return view('customer.doctors.index', compact('doctors'));
    }

    public function search(Request $request){
        if($request->specialism && $request->name){
            $c = Doctor::where('specialism', 'like', '%'.$request->specialism.'%')->where('name', 'like', '%'.$request->name.'%')->get();
            return response()->json($c);
        }
        if($request->name){
            $a = Doctor::where('name', 'like', '%'.$request->name.'%')->get();
            return response()->json($a);
        }
        if($request->specialism){
            $b = Doctor::Where('specialism', 'like', '%'.$request->specialism.'%') ->get();
            return response()->json($b);
            
        }
    }

    public function postLogin(Request $request)
    {
        $credential = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt(['email' => $credential['email'], 'password' => $credential['password']])) {

            return redirect('/doctor/home')->with('success', 'Successfully logged in.');
        } else {
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->withErrors(["Incorrect user login details!"]);
        }
    }


    public function getRegister()
    {

        return view('doctor.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'bail|email|required|unique:doctors',
            'password' => 'bail|required|min:8|same:c_password',
            'c_password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1
        ];

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        } else {
            $doctor = Doctor::create($data);
            return redirect('/doctor/login')->with('success', 'Successfully signed up.')->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('doctor')->logout();
        session()->flush();

        return redirect('/doctor/login')->with('success', 'Successfully logged out.');
    }

    public function getLogin()
    {
        return view('doctor.auth.login');
    }
}
