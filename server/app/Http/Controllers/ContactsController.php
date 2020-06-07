<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_me;
use Illuminate\Support\Facades\DB;
use App\Mail\adminContactMail;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function submitContactForm(Request $request){
        $f_name     = $request->input('full_name');
        $ph_num     = $request->input('phone_number');
        $email_id   = $request->input('email');
        $subject    = $request->input('subject');
        $message    = $request->input('message');

        //+++++++++++++++++++++ INSERT INTO DB :: Start +++++++++++++++++++++//
        $Contact_me   = new Contact_me();

        $Contact_me->full_name  = $f_name;
        $Contact_me->phone      = $ph_num;
        $Contact_me->email_id   = $email_id;
        $Contact_me->subject    = $subject;
        $Contact_me->message    = $message;

        $insertContact  = $Contact_me->save();
        //+++++++++++++++++++++ INSERT INTO DB :: End +++++++++++++++++++++//

        //+++++++++++++++++++++ SENDING NOTIFICATION EMAIL TO ADMIN :: Start +++++++++++++++++++++//
        $contactArr = array();

        $contactArr['f_name']   = $f_name;
        $contactArr['ph_num']   = $ph_num;
        $contactArr['email_id'] = $email_id;
        $contactArr['subject']  = $subject;
        $contactArr['message']  = $message;

        Mail::to('sandeepnandi4@gmail.com')
            ->send(new adminContactMail($contactArr));
        //+++++++++++++++++++++ SENDING NOTIFICATION EMAIL TO ADMIN :: End +++++++++++++++++++++//
        
        return array('insertStatus'=>$insertContact);
    }
}
