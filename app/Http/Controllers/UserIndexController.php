<?php

namespace Zoom\Http\Controllers;

use Illuminate\Http\Request;
use Zoom\AboutUs as AboutUs;
use Zoom\User as User;
use Zoom\Testimonial as Testimonial;
use Zoom\Service as Service;
use Zoom\Contact as Contact;

use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class UserIndexController extends Controller
{
    /*
    * shows about us, Testimonials and services in customer home page  
    */
    public function index()
    {
        $aboutus     = AboutUs::find('1');
        $testimonials = Testimonial::all();
        $services     = Service::all();
        return view('index',compact('aboutus','testimonials','services'));
        
    }
    /*
    * creats a new contact msg, saves the msg in  the database and send it to the Admin's email
    */
    public function create(Request $request)
    {
        $inputs = $request->all();
        $Contact = new Contact;
        $Contact->FirstName  = trim($inputs['FirstName']);
        $Contact->LastName   = trim($inputs['LastName']);
        $Contact->email      = trim($inputs['email']);
        $Contact->phone      = trim($inputs['phone']);
        $Contact->serviceId  = trim($inputs['serviceId']);
        $Contact->message    = trim($inputs['message']);
        
        if ($Contact->save()) {
            $Service     = Service::find($inputs['serviceId']);
            $ServiceName=$Service->name;
            $headers = 'From: ' .$inputs['email']. "\r\n" ;
            $User = User::find('1');
            $to=$User->email; 
            $subject=$inputs['FirstName']." ".$inputs['LastName'].",".$ServiceName;
            $message=$inputs['message'];
            $mail=mail($to,$subject,$message,$headers);
            $mail=mail($to,$subject,$message,$headers);
            /*
            if($mail)
            return($message);
            else
                return("No");
            */
            return ('<div class="alert alert-success alert-dismissable input-container" style="width: 620px !important;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Your message has been sent successfully.</strong><br> We appreciate you contacting us about '.$ServiceName.'. We will be in touch with you shortly.
                        </div>');
        } else {
            return ('
                        <div class="alert alert-danger alert-dismissable input-container">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Something went wrong!</strong>
                        </div>');
        }
        
    }   
    
   
}
