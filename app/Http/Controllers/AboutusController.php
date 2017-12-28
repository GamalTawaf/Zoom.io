<?php

namespace Zoom\Http\Controllers;
use Zoom\AboutUs as AboutUs;
use Illuminate\Http\Request;
use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class Aboutuscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *Shows the AboutUs information in the form
    */
    public function index()
    {
        $aboutUs = AboutUs::find('1');
        $data['aboutUs'] = $aboutUs ;
        return view('Admin.AboutUs',$data);
    }

    /*
    *updates AboutUs information.
    */
    public function update(Request $request)
    {
        
        $inputs  = $request->all();
        $text    = trim($inputs['text']);
        $aboutUs = AboutUs::find('1');
        $aboutUs->text =$text;
        if($aboutUs->save()) {
            return("Done");

        }

    }

}
