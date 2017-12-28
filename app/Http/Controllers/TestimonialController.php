<?php

namespace Zoom\Http\Controllers;
use Zoom\Testimonial as Testimonial;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    * shows the testimonial page which is used to add a new one
    */
    public function index()
    {
        return view('Admin.Testimonials');
    }

    /*
    * create a new Testimonial which upload photos too. 
    */
    public function create(Request $request)
    {
        // ckeck files' extensions
        $error=0;
        for ($i=1; $i <=4 ; $i++) { 
            if ($request->hasFile('img'.$i)) {   
                $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
                $detectedType = exif_imagetype($_FILES['img'.$i]['tmp_name']);
                $error = !in_array($detectedType, $allowedTypes);
                if ($error!='0') {
                    exit("extensions");
                }
            }
        }
    
        $inputs      = $request->all();
        $Testimonial = new Testimonial;
        $Testimonial->title         = trim($inputs['title']);
        $Testimonial->text          = trim($inputs['text']);
        $Testimonial->reference     = trim($inputs['reference']);
        if ($Testimonial->save()) {
                $lastInsertId = $Testimonial->id;
                $destinationPath = 'uploads/testimonials';                        
                $images="";
                for ($i=1; $i <=4 ; $i++) { 
                    //${'img'.$i}     = $request->file('img'.$i);
                    if ($request->hasFile('img'.$i)) { 
                        $imgFile  = $request->file('img'.$i);
                        $imgName  = $imgFile->getClientOriginalName();
                        $arr=explode(".",$imgName);
                        $imgExtinstion=$arr[1];
                        $img   ="img".$i."_".$lastInsertId.".".$imgExtinstion;
                        if ($imgFile->move($destinationPath,$img)) 
                            {
                                if ($i==1) {
                                    $images .= "$img";
                                }
                                else
                                    $images .= ",$img";
                                
                            }
                        }
                    }
                $Testimonial = Testimonial::find($lastInsertId);  
                $Testimonial->images   = $images;
                $Testimonial->save();
                return ("Done");   

            }    

        }

    /*
    * shows all testimonials inside a table in the admin part 
    */    
    public function show()
    {
        $testimonial = Testimonial::all();
        $data['Testimonial'] = $testimonial ;
        return view('Admin.ShowTestimonials',$data);
        
    }

    /*
    * shows edited form of the chosen testimonial with its previous data  
    */    
    public function edit(Request $request)
    {
        $inputs=$request->all();
        $Id=$inputs['Id'];
        $Testimonial = Testimonial::where('id', '=', $Id)->first();
        $title=$Testimonial->title;
        $text=$Testimonial->text;
        $reference=$Testimonial->reference;
        return response()->json(['success' => true, 'Message' => 'Your category was created.', 'title' => $title, 'text' => $text, 'reference' => $reference,'id'=>$Id]);
    }

    /*
    * updates the testimonial which has been chosen and uplodes photos too.
    */    
    public function update(Request $request)
    {
        $inputs = $request->all();
        $id        = $inputs['id'];
        $title     = trim($inputs['title']);
        $text      = trim($inputs['text']);
        $reference = trim($inputs['reference']);
        
        $Testimonial = new Testimonial;
            
        $Testimonial = Testimonial::find($id);
        $Testimonial->title          = $title;
        $Testimonial->text           = $text;
        $Testimonial->reference      = $reference;

        if ($Testimonial->save()) 
            {
                $destinationPath = 'uploads/testimonials'; 

                // delete previous files 
                $imgArr=explode(",",$Testimonial->images);                       
                foreach ($imgArr as $key => $value) {
                    if (file_exists($destinationPath.'/'.$value) && $value!='') {
                        unlink($destinationPath.'/'.$value);
                    }
                }
                $images="";

                for ($i=1; $i <=4 ; $i++) {

                    if ($request->hasFile('img'.$i)) { 
                        $imgFile  = $request->file('img'.$i);
 
                        $imgName  = $imgFile->getClientOriginalName();
                        $arr=explode(".",$imgName);
                        $imgExtinstion=$arr[1];
                        $img   ="img".$i."_".$id.".".$imgExtinstion;
                        if ($imgFile->move($destinationPath,$img)) 
                            {
                                if ($i==1) {
                                    $images .= "$img";
                                }
                                else
                                    $images .= ",$img";
                                
                            }
                        }
                    }
                $Testimonial = Testimonial::find($id);  
                $Testimonial->images   = $images;
                $Testimonial->save();

                return ('Done');
            }
        
    }

    /*
    * deletes the testimonial which has been chosen and delete the photos from the file.
    */
    public function delete(Request $request)
    {
        $Testimonial = Testimonial::find($request->Id);

        $destinationPath = 'uploads/testimonials';
        // delete files 
        $imgArr=explode(",",$Testimonial->images);                       
        foreach ($imgArr as $key => $value) 
            {
                if (file_exists($destinationPath.'/'.$value) && $value!='') {
                        unlink($destinationPath.'/'.$value);
                    }
            }

        $Testimonial->delete();
        return("Done");

    }
}
