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
    $contactReason = $request->contactReason;

    if($channel == '' && $contactReason == ''  &&  $from == '' &&  $to =='' )
    {
        $total_request = Apology::where('status', 0)->count();
        $total_amount = Apology::where('status', 0)->sum('Amount');
        $Count_Cases = Apology::where('status', 0)->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('status', 0)->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));

    }
    elseif($channel && $contactReason== ''  &&  $from == '' &&  $to =='' )
    {
        $total_request = Apology::where('Channel', $channel )->count();
        $total_amount = Apology::where('Channel', $channel )->sum('Amount');
        $Count_Cases = Apology::where('Channel', $channel )->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('Channel', $channel )->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
    elseif($channel && $contactReason  && $from == '' &&  $to =='')
    {
        $total_request = Apology::where('Channel', $channel )->where('ContactReason', $contactReason)->count();
        $total_amount = Apology::where('Channel', $channel )->where('ContactReason', $contactReason)->sum('Amount');
        $Count_Cases = Apology::where('Channel', $channel )->where('ContactReason', $contactReason)->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('Channel', $channel )->where('ContactReason', $contactReason)->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
    elseif($channel=='' && $contactReason  && $from == '' &&  $to =='')
    {
        $total_request = Apology::where('ContactReason', $contactReason)->count();
        $total_amount = Apology::where('ContactReason', $contactReason)->sum('Amount');
        $Count_Cases = Apology::where('ContactReason', $contactReason)->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('ContactReason', $contactReason)->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
    elseif($channel== '' && $contactReason == ''  && $from &&  $to)
    {
        $total_request = Apology::whereBetween('DateGiven', [$from , $to])->count();
        $total_amount = Apology::whereBetween('DateGiven', [$from , $to])->sum('Amount');
        $Count_Cases = Apology::whereBetween('DateGiven', [$from , $to])->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::whereBetween('DateGiven', [$from , $to])->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
    elseif($channel  && $contactReason == ''  && $from &&  $to)
    {
        $total_request = Apology::where('Channel', $channel )->whereBetween('DateGiven', [$from , $to])->count();
        $total_amount = Apology::where('Channel', $channel )->whereBetween('DateGiven', [$from , $to])->sum('Amount');
        $Count_Cases = Apology::where('Channel', $channel )->whereBetween('DateGiven', [$from , $to])->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('Channel', $channel )->whereBetween('DateGiven', [$from , $to])->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
    elseif($channel && $contactReason  && $from &&  $to)
    {
        $total_request = Apology::where('Channel' ,$channel )->where('ContactReason',$contactReason )->whereBetween('DateGiven', [$from , $to])->count();
        $total_amount = Apology::where('Channel' ,$channel )->where('ContactReason',$contactReason )->whereBetween('DateGiven', [$from , $to])->sum('Amount');
        $Count_Cases = Apology::where('Channel' ,$channel )->where('ContactReason',$contactReason )->whereBetween('DateGiven', [$from , $to])->DISTINCT('CaseNumber')->count();
        $Count_Order = Apology::where('Channel' ,$channel )->where('ContactReason',$contactReason )->whereBetween('DateGiven', [$from , $to])->count();
        return view('dashboard.customise',compact('total_request' ,'total_amount' ,'Count_Cases','Count_Order' ,'channel','contactReason' , 'from' , 'to' ));
    }
 


    }

    public function ContactReasonReport(Request $request){
        $from = $request->startDate; 
        $to = $request->endDate; 
        $allContactReason = Apology::where('status', 0)->DISTINCT('ContactReason')->get('ContactReason');
        $data = [];
      
        return $data ;

        if($from == '' &&  $to =='')
        {
            foreach($allContactReason as $contactReason)
           {
            
            $Contact_Reason = $contactReason->ContactReason ;
            $Total_Request = Apology::where('ContactReason', $contactReason->ContactReason)->count();
            $Total_Ex_req = agentRequest::where('ContactReason', $contactReason->ContactReason)->count() ;
            $Total_Ex_Acc = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Accepted')->count() ;
            $Total_Ex_Rej = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Rejected')->count() ;
            $Amount = Apology::where('ContactReason', $contactReason->ContactReason)->sum('Amount') ;
            $Count_Cases = Apology::where('ContactReason', $contactReason->ContactReason)->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('ContactReason', $contactReason->ContactReason)->count();
           
            $data[$contactReason->ContactReason]=[$Contact_Reason  , $Total_Request ,$Total_Ex_req ,$Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases , $Count_Order ];

           }
           return $data ;

        }
        else
        {
            foreach($allContactReason as $contactReason)
           {
            
            $Contact_Reason = $contactReason->ContactReason ;
            $Total_Request = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count();
            $Total_Ex_req = agentRequest::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Acc = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Accepted')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Rej = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Rejected')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Amount = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->sum('Amount') ;
            $Count_Cases = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count();
           
            $data[$contactReason->ContactReason]=[$Contact_Reason  , $Total_Request ,$Total_Ex_req ,$Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases , $Count_Order ];

           }
           return $data ;
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

