<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ContactControllerUI extends Controller
{
    //function to return the contactView
    public function viewform(){
        return view('contactView');
    }
    //getting all the data 
    public function index(){
        $contact = DB::select('select * from contact');
        return view('contactView',['contact' => $contact]);
    }
    // function to return the contactform
    public function contactform(){
        return view('contactForm');
    }

    // save data
    public function contactSave(Request $request){

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $age = $request->input('age');
        $salary = $request->input('salary');
        $address = $request->input('address');

        DB::insert('insert into contact (firstName,lastName,email,age,salary,address) values (?,?,?,?,?,?)'
        ,[$firstname,$lastname,$email,$age,$salary,$address]);
        return redirect('https://8000-michaelisla-gitpodworksp-5epwildkxgo.ws-eu34.gitpod.io/addContact')->with('success','Data saved');

    }
    //get data by id that will fill text fields in edit view
    public function contactEdit($id){
        $contact = DB::select('select * from contact where id = ?',[$id]);
        return view('contactEdit',['contact'=>$contact]);
    }
    // Update
    public function contactUpdate(Request $request, $id){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $age = $request->input('age');
        $salary = $request->input('salary');
        $address = $request->input('address');

        DB::update('update contact set firstName = ?,lastName = ?,email = ?,age = ?,salary = ?,address = ? where id = ?'
        ,[$firstname,$lastname,$email,$age,$salary,$address,$id]);

        return redirect('https://8000-michaelisla-gitpodworksp-5epwildkxgo.ws-eu34.gitpod.io/contactview')->with('success','Data updated');
    }
    //Delete
    public function contactDelete($id){
        DB::delete('delete from contact where id = ?',[$id]);
        return redirect('https://8000-michaelisla-gitpodworksp-5epwildkxgo.ws-eu34.gitpod.io/contactview')->with('success','Data deleted');
    }
}
