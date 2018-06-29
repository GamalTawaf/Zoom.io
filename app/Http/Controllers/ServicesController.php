<?php

namespace Zoom\Http\Controllers;

use Zoom\Service as Service;
use DB;

use Illuminate\Http\Request;

use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
    * shows servises list into a table
    */
    public function index()
    {
        $service = Service::all();
        $data['service'] =  $service ;
        return view('Admin.Services',$data);
    }

    /*
    * creats a new service
    */
    public function create(Request $request)
    {
        
        $inputs = $request->all();
        
        $Service = Service::firstOrCreate(['name' => $inputs['name']]);        
        if ($Service->wasRecentlyCreated) {
            $msg = array();
            $msg[0] = 'Done';
            $msg[1] = "$Service->id";
            $msg[2] =csrf_token();

            return ($msg);
        } else {
            return ('<div id="WrongMessage">            
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Something went wrong!</strong> It seems you have already same service.
                        </div>
                    </div>
            ');
        }
        
    }


    /*
    * updates the service which has been chosen.
    */
    public function edit(Request $request)
    {
        //
        $inputs = $request->all();
        $service = Service::find($inputs['id']);
        $service->name = trim($inputs['name']);
        $service->save();
        return($inputs['name']);
    }


    /*
    * deletes the service which has been chosen.
    */
    public function delete(Request $request)
    {
        //
        $inputs = $request->all();
        $service = Service::find($inputs['id']);
        $service->delete();
        return("Done");
    }

 
}
