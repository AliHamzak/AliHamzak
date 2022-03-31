<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    public function about_us(){
        return view('about_us');
    }

    public function contact_us(){
        return view('contact_us');
    }
    
    function save_contactus(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg,
        );

        Mail::send('mail', $data, function($message){
            $message->to('alihamzag19@gmail.com', 'Ali')->subject('Contact Us Query');
            $message->from('alihamzag19@gmail.com','Hamza');
        });

        return redirect('page/contact-us')->with('success','Mail has been sent.');
    }
}
