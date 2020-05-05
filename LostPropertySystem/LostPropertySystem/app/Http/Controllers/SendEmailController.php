<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\lostitems;

class SendEmailController extends Controller
{
    function index()
    {

        $id=15;
        //need user data for email
        $item = lostitems::find($id);
        return view('admin.send_email',compact('item'));
    }


    function send(Request $request)
    {


        $to_name = $request->name;

        $to_email = $request->email;

        $data = array('name'=>'From Filo System','body'=>$request->message);

        Mail::send('admin.dynamic_email_template', $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email,$to_name)->subject('Filo System Email');
            $message->from('imrankm880@gmail.com','Filo System Test Email');


});
        return redirect('dashboard/items-Pendinglist');
    }




}
