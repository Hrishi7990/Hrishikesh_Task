<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator; 
use Session;  

class ClientController extends Controller
{
    public function clientList(){
        $data['clientList'] = Client::orderBy('id','desc')->get();
        return view('clientList',$data);
    }
    public function addClient(){
        return view('addClient');
    }
    public function postClient(Request $request)
    {
         $rules = [
            'client_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required', 
            'notes' => 'required',
        ];
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        // dd($validator);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
                $client = new Client();
                $client->name = $request->input('client_name');
                $client->email = $request->input('email');
                $client->address = $request->input('address');
                $client->city = $request->input('city');
                $client->notes = $request->input('notes');
                $client->save();
                return redirect('/clients-list')->with('success','Client details added successfully.');
          
        }
    }
     public function editClient($id){
        $data['singleData']=Client::where('id',$id)->first();
        return view('addClient',$data);
    }
}
