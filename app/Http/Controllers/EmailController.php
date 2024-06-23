<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail() {
        $toEmail = "ravi395950@gmail.com";
        $message = "Hello Ravi keya hal chal hai aapke mail me welcome hai";
        $subject = "Welcome Ravi kumar";

       $request = Mail::to($toEmail)->send(new welcomeemail($message, $subject));
       dd($request);
    }


    public function MailSend(Request $request) {
       $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required|min:5|max:100',
          'message' => 'required|min:10|max:255',
          'attachment' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048'
       ]);

       $fileName = time().".".$request->file('attachment')->extension();
       $request->file('attachment')->move('upload', $fileName);

       $adminEmail = "rkconsultancy34@gmail.com";

       $response = Mail::to($adminEmail)->send(new welcomeemail($request->all(), $fileName));

       if($response){
        return back()->with('success', "Thanks You for contactiong us");
       }else{
        return back()->with('error', "Unable to submit form, Please try again");
       }

    }


}
