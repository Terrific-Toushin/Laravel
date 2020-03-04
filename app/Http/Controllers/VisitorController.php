<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use Session;
use Mail;

class VisitorController extends Controller
{
    public function addVisitor() {
        return view('front.visitor.add-visitor');
    }

    public function newVisitor(Request $request) {

        $visitor = new Visitor();
        $visitor->first_name = $request->first_name;
        $visitor->last_name = $request->last_name;
        $visitor->email_address = $request->email_address;
        $visitor->password = bcrypt($request->password);
        $visitor->address = $request->address;
        $visitor->phone_number = $request->phone_number;
        $visitor->save();

        Session::put('id', $visitor->id);
        Session::put('name', $visitor->first_name.' '.$visitor->last_name);

        $data = $visitor->toArray();

        Mail::send('mails.registration-mail', $data, function ($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('Registration Confimation Mail');
        });



        return redirect('/')->with('message', 'Your registration successfully done');
    }

    public function visitorLogout() {
        Session::forget('id');
        Session::forget('name');

        return redirect('/');
    }

    public function visitorLogin() {
        return view('front.visitor.visitor-login');
    }

    public function visitorLoginCheck(Request $request) {
        $visitor = Visitor::where('email_address', $request->email_address)->first();
        if (password_verify($request->password, $visitor->password)) {

            Session::put('id', $visitor->id);
            Session::put('name', $visitor->first_name.' '.$visitor->last_name);

            return redirect('/');
        } else {
            return redirect()->back()->with('message', 'Invalid email or password');
        }
    }
    public function emilCheck($email) {
        $visitor = Visitor::where('email_address', $email)->first();
        if($visitor) {
            return 'Email Address Already Exists';
        } else {
            return 'Email Address Available';
        }
    }

//    public function emilCheck($email) {
//        $visitor = Visitor::where('email_address', $email)->first();
//        if($visitor) {
//            echo 'Email Address Already Exists';
//        } else {
//            echo 'Email Address Available';
//        }
//    }

}
