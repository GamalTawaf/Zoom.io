<?php

namespace Zoom\Http\Controllers;

use Zoom\Contact as Contact;

use Illuminate\Http\Request;

use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *shows contact messages in two different categories(opened and unopened  ) 
    */
    public function ContactUsShow( )
    {
        
        $ContactOpen    = Contact::where('status', 1)->get()->sortByDesc("id");
        $Contact        = Contact::where('status','<>', 1)->get()->sortByDesc("id");
        return view('Admin.ContactUsMessage',compact('Contact','ContactOpen'));
    } 


    /*
    *changes the message status to read
    */
    public function ContactUsRead(Request $request)
    {
        
        $inputs =$request->all();
        $Contact     = Contact::find($inputs['Id']);
        $Contact->status = 3;
        $Contact->save();
        
    } 


    /*
    *changes the message status to opened after clicking on the notification box
    */
    public function OpenNotification( )  
    {
        $ContactUnOpen  = Contact::where('status', '=', 1)->update(['status' => 2]);
            return("Done");
        
    }
}
