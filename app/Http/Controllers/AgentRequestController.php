<?php

namespace App\Http\Controllers;
use App\Models\agentRequest;
use App\Models\Apology;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class AgentRequestController extends Controller
{
   public function view_pending(){
    
    $data = agentRequest::where('status', 'Pending')->get();

    return view('dashboard.userlist' , compact('data'));

   }
  
   public function view_accepted(){

    $data = agentRequest::where('status', 'Accepted')->get();

    return view('dashboard.userlist' , compact('data'));

   }

   public function view_reject(){
    
    $data = agentRequest::where('status', 'Rejected')->get();

    return view('dashboard.userlist' , compact('data'));

   }

   public function reject($id)
   {
    // Find the model instance by ID
    $model = agentRequest::find($id);

    // Check if the model exists
    if ($model) {
        // Delete the model
        $model->status = 'Rejected';
        $model->save();
        session()->flash('success', 'Record Rejected successfully!');
        }
        else 
        session()->flash('error', 'Record not found!');

    
        return redirect()->back();
   }

   public function accept($id)
   {
    // Find the model instance by ID
    $Request = agentRequest::find($id);

    // Check if the model exists
    if ($Request) {

        $amount = $Request->Amount ;

        $apoData = Apology::where('Amount',$amount )->where('status' , true)->first();

        
        if(isset($apoData->Code))
        {
          $apoData->AgentName = Auth::user()->email ;
          $apoData->OrderNumber = $Request->OrderNumber;
          $apoData->CustomerID = $Request->CustomerID;
          $apoData->CustomerEmail = $Request->CustomerEmail;
          $apoData->DateGiven = $Request->DateGiven;
          $apoData->ContactReason = $Request->ContactReason;
          $apoData->Channel = $Request->Channel;
          $apoData->CaseNumber = $Request->CaseNumber;
          $apoData->status = false ;

          $apoData->save();
          $Request->status = 'Accepted';
          $Request->save();
          $retriveData = ['week'=> $apoData->WeekIssued ,'Code'=> $apoData->Code ,'Amount'=> $apoData->Amount ,'ExpaireDate'=> $apoData->ExpaireDate ];
          session()->flash('success', ' this request accepted successfully !  ' );
        }
        else{
            session()->flash('error', 'Record not found!');
        }

        // return view('dashboard.userlist',compact('apoData'));
        return redirect()->back()->with('data',$retriveData);
    }
  }

}
