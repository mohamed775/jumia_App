<?php

namespace App\Http\Controllers;
use App\Models\agentRequest;
use App\Models\Apology;
use App\Models\User;
use Illuminate\Http\Request;


class AnalysisController extends Controller
{

  
    public function channelReport(Request $request){

    $channel = $request->channelName ;
    $from = $request->startDate; 
    $to = $request->endDate; 

    if($channel &&  $from == '' &&  $to =='' )
    {
        $total_request = Apology::where('Channel' ,$channel )->count();
        $total_amount = Apology::where('Channel' ,$channel )->sum('Amount');
        $Count_Order= Apology::where('Channel' ,$channel )->count('OrderNumber');
        $Count_Cases = Apology::where('Channel' ,$channel )->groupBy('CaseNumber')->count();

        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ));
    }
    else
    {
        $total_request = Apology::where('Channel' ,$channel )->whereBetween('DateGiven', [$from , $to])->count();
        $total_amount = Apology::where('Channel' ,$channel )->whereBetween('DateGiven', [$from , $to])->sum('Amount');
        $Count_Cases = Apology::where('Channel' ,$channel )->whereBetween('DateGiven', [$from , $to])->count('OrderNumber');
        $Count_Order = Apology::where('Channel' ,$channel )->whereBetween('DateGiven', [$from , $to])->count('CaseNumber');
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ));
    }





    }



    public function inbound_score(){

     $agent_data = User::where('channel' , 'CS Inbound') ->get();

     return  view('dashboard.table-data',compact('agent_data')) ;

    }


    public function liveChat_score(){
       
        $agent_data = User::where('channel' , 'Live Chat') ->get();
     
        return  view('dashboard.table-data',compact('agent_data')) ;
 
    }

    public function socialMedia_score(){
        
     $agent_data = User::where('channel' , 'Social Media') ->get();
     
     return  view('dashboard.table-data',compact('agent_data')) ;

    }

    public function IR_score(){
        
    $agent_data = User::where('channel' , 'IR Team') ->get();
     
     return  view('dashboard.table-data',compact('agent_data')) ;

    }
    public function sales_score(){
        
        $agent_data = User::where('channel' , 'Sales') ->get();
         
         return  view('dashboard.table-data',compact('agent_data')) ;
    
        }

    // public function CR_score(){

    //     $agent_data = Apology::get();
         
    //     return  view('dashboard.table-data',compact('agent_data')) ;
        
    // }
}

