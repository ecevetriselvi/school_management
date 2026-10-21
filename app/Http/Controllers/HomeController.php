<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user())
            {
                $users = User::get();
                $students = Student::get();
                $id = 1;
                return view('welcome',compact('users','students','id'));
            }
        else
            {
                return view('login');
            } 
    }
   public function store(Request $request)
   {
    Student::updateOrCreate(
        ['id' => $request->id],
        [
            'admission_no' => $request->admission_no,
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'parent_id' => $request->parent_id,
            'admission_date' => $request->admission_date,
            'status' => $request->status,
        ]
    );
    return redirect()->back()->with('success', 'Data saved successfully.');
    }
        
    public function fetch(Request $request)
    {
        $student= Student::where('id',$request->id)
                    ->select('id','admission_no','name','gender','date_of_birth','phone','password','address','class_id','section_id','parent_id','admission_date','status')
                    ->first();
        return response()->json($student);
    }
    public function delete(Request $request)
    {
        Student::where('id', $request->id)->delete();
        return 1;
    }
    public function show($id)
    {
        $student=Student::where('id',$id)->first();
        if(!$user) {abort(404);}
        return view('show',compact('user'));
    }
    //public function login(Request $request)
    //{
        //if(Auth::attempt([
            //'name'=>$request->name,
            //'password'=>$request->password,   
        //]))
        //{
            //return redirect('/');
        //}
        //else{
           // return redirect()->back()->with('error', 'Invalid Credientials');
        //}
    //}
    //public function login(Request $request)
    //{
    //dd($request->all());
    //}
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}

