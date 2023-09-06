<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator; 
use Session;  

class EmployeeController extends Controller
{
     public function index(){
        $data['employeeList'] = Employee::orderBy('id','desc')->get();
        return view('index',$data);
    }
    public function addEmployee(){
        return view('addEmployee');
    }
    public function postEmployee(Request $request)
    {
         $rules = [
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required',
            'status' => 'required', 
        ];
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        // dd($validator);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
               $employee = new Employee();
                $employee->name = $request->input('employee_name');
                $employee->email = $request->input('email');
                $employee->phone_number = $request->input('contact');
                $employee->active = $request->input('status');
                $employee->save();
                return redirect('/')->with('success','Employee details added successfully.');
          
        }
    }
    public function editEmployee($id){
        $data['singleData']=Employee::where('id',$id)->first();
        return view('addEmployee',$data);
    }
    public function postEditEmployee(Request $request, $id)
    {
         $rules = [
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required',
            'status' => 'required', 
        ];
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        // dd($validator);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
               $employee = Employee::find($id);
                $employee->name = $request->input('employee_name');
                $employee->email = $request->input('email');
                $employee->phone_number = $request->input('contact');
                $employee->active = $request->input('status');
                $employee->save();
                return redirect('/')->with('success','Employee details updated successfully.');
          
        }
    }
    public function changeStatus($id){
        $employee = Employee::find($id);
        if($employee->active==1){
            $employee->active=0;
            $employee->save();
            return redirect('/')->with('success','Employee status updated successfully.');
        }else{
            $employee->active=1;
            $employee->save();
            return redirect('/')->with('success','Employee status updated successfully.');
        }
        
    }
}
