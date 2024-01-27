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
      
        if($from == '' &&  $to =='')
        {
            foreach($allContactReason as $contactReason)
           {
            
            $Total_Request = Apology::where('ContactReason', $contactReason->ContactReason)->count();
            $Total_Ex_req = agentRequest::where('ContactReason', $contactReason->ContactReason)->count() ;
            $Total_Ex_Acc = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Accepted')->count() ;
            $Total_Ex_Rej = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Rejected')->count() ;
            $Amount = Apology::where('ContactReason', $contactReason->ContactReason)->sum('Amount') ;
            $Count_Cases = Apology::where('ContactReason', $contactReason->ContactReason)->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('ContactReason', $contactReason->ContactReason)->count();
           
            $data[$contactReason->ContactReason]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.cr',['data' => $data]);

        }
        elseif($from &&  $to)
        {
            foreach($allContactReason as $contactReason)
           {
            
            $Total_Request = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count();
            $Total_Ex_req = agentRequest::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Acc = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Accepted')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Rej = agentRequest::where('ContactReason', $contactReason->ContactReason)->where('status', 'Rejected')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Amount = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->sum('Amount') ;
            $Count_Cases = Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('ContactReason', $contactReason->ContactReason)->whereBetween('DateGiven', [$from , $to])->count();
           
            $data[$contactReason->ContactReason]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.cr',['data' => $data]);
        }
    }



    public function channelScore(Request $request){

        $from = $request->startDate; 
        $to = $request->endDate; 
        $channel = Apology::where('status', 0)->DISTINCT('Channel')->get('Channel');
        $channelData =[];
        if($from == '' &&  $to =='')
        {
            foreach($channel as $channel)
           {
            
            $Total_Request = Apology::where('Channel', $channel->Channel)->count();
            $Total_Ex_req = agentRequest::where('Channel', $channel->Channel)->count() ;
            $Total_Ex_Acc = agentRequest::where('Channel', $channel->Channel)->where('status', 'Accepted')->count() ;
            $Total_Ex_Rej = agentRequest::where('Channel', $channel->Channel)->where('status', 'Rejected')->count() ;
            $Amount = Apology::where('Channel', $channel->Channel)->sum('Amount') ;
            $Count_Cases = Apology::where('Channel', $channel->Channel)->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('Channel', $channel->Channel)->count();
           
            $channelData[$channel->Channel]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.table-data',['channelData' => $channelData]);

        }
        elseif($from &&  $to)
        {   
            foreach($channel as $channel)
           {
            
            $Total_Request = Apology::where('Channel', $channel->Channel)->whereBetween('DateGiven', [$from , $to])->count();
            $Total_Ex_req = agentRequest::where('Channel', $channel->Channel)->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Acc = agentRequest::where('Channel', $channel->Channel)->where('status', 'Accepted')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Rej = agentRequest::where('Channel', $channel->Channel)->where('status', 'Rejected')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Amount = Apology::where('Channel', $channel->Channel)->whereBetween('DateGiven', [$from , $to])->sum('Amount') ;
            $Count_Cases = Apology::where('Channel', $channel->Channel)->DISTINCT('CaseNumber')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Count_Order =  Apology::where('Channel', $channel->Channel)->whereBetween('DateGiven', [$from , $to])->count();
           
            $channelData[$channel->Channel]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.table-data',['channelData' => $channelData]);
        }



    }

    public function agentScore(Request $request){

        $from = $request->startDate; 
        $to = $request->endDate; 
        $channel = $request->channelName ;
        $AgentData =[];

        if($channel=='' && $from == '' &&  $to =='')
        {
            $agent = Apology::where('status', 0)->DISTINCT('AgentName')->get('AgentName');
           foreach($agent as $agent)
           {
            
            $Total_Request = Apology::where('AgentName', $agent->AgentName)->count();
            $Total_Ex_req = agentRequest::where('AgentName', $agent->AgentName)->count() ;
            $Total_Ex_Acc = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Accepted')->count() ;
            $Total_Ex_Rej = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Rejected')->count() ;
            $Amount = Apology::where('AgentName', $agent->AgentName)->sum('Amount') ;
            $Count_Cases = Apology::where('AgentName', $agent->AgentName)->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('AgentName', $agent->AgentName)->count();
           
            $AgentData[$agent->AgentName]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.table-data',['AgentData' => $AgentData] );

        }
        elseif($channel && $from == '' &&  $to =='')
        {
           $agent = Apology::where('status', 0)->where('Channel',  $channel)->DISTINCT('AgentName')->get('AgentName');
           foreach($agent as $agent)
           {
            
            $Total_Request = Apology::where('AgentName', $agent->AgentName)->count();
            $Total_Ex_req = agentRequest::where('AgentName', $agent->AgentName)->count() ;
            $Total_Ex_Acc = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Accepted')->count() ;
            $Total_Ex_Rej = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Rejected')->count() ;
            $Amount = Apology::where('AgentName', $agent->AgentName)->sum('Amount') ;
            $Count_Cases = Apology::where('AgentName', $agent->AgentName)->DISTINCT('CaseNumber')->count() ;
            $Count_Order =  Apology::where('AgentName', $agent->AgentName)->count();
           
            $AgentData[$agent->AgentName]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.table-data',['AgentData' => $AgentData], compact('channel'));

        }
        elseif($channel && $from &&  $to)
        {   
            $agent = Apology::where('status', 0)->where('Channel',  $channel)->DISTINCT('AgentName')->get('AgentName');

            foreach($agent as $agent)
           {
            
            $Total_Request = Apology::where('AgentName', $agent->AgentName)->whereBetween('DateGiven', [$from , $to])->count();
            $Total_Ex_req = agentRequest::where('AgentName', $agent->AgentName)->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Acc = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Accepted')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Total_Ex_Rej = agentRequest::where('AgentName', $agent->AgentName)->where('status', 'Rejected')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Amount = Apology::where('AgentName', $agent->AgentName)->whereBetween('DateGiven', [$from , $to])->sum('Amount') ;
            $Count_Cases = Apology::where('AgentName', $agent->AgentName)->DISTINCT('CaseNumber')->whereBetween('DateGiven', [$from , $to])->count() ;
            $Count_Order =  Apology::where('AgentName', $agent->AgentName)->whereBetween('DateGiven', [$from , $to])->count();
           
            $AgentData[$agent->AgentName]=[ $Total_Request  , $Total_Ex_req , $Total_Ex_Acc ,$Total_Ex_Rej ,$Amount ,$Count_Cases ,$Count_Order ];

           }
           return view('dashboard.table-data',['AgentData' => $AgentData]);
        }



    }



}

