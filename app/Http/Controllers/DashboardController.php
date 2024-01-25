<?php

namespace App\Http\Controllers;

use App\Jobs\uploadFile;
use App\Models\Apology;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class DashboardController extends Controller
{
    public function view(){
       return view('dashboard.uploadForm');
     }

    public function getAllData(){
       $data = Apology::all();
       return view('dashboard.table-APO_all' ,compact('data'));
    }

    public function upload()
    {

        if(request()->has('mycsv')){

            $data =  file(request()->mycsv) ;
            
            $chunk =  array_chunk($data ,1000 );
            $header =[];
            // return $chunk ;
            $batch = Bus::batch([])->dispatch();
            foreach($chunk as $key => $chunk)
            {
    
             $data = array_map('str_getcsv' ,$chunk) ;
            //  dd($data[0]);
             if($key === 0)
             {
                   $header = $data[0];
                   unset($data[0]);
             }
             $batch->add(new uploadFile($data , $header));
            // uploadFile::dispatch($data , $header);
            }
            return redirect()->route('uploadForm')->with('success', 'SUCCESS ! Your request will been process') ; 
        }
         return redirect()->route('uploadForm')->with('failed', 'Failed ! You Must Select File ') ; 
           
    
        
        
    }
}
