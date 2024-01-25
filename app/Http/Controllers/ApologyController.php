<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Apology;
use App\Models\agentRequest;

use Illuminate\Http\Request;

class ApologyController extends Controller
{

    public function ApologyHome_view(){

        return view("users.APO.ApologyOption");
     }

     public function searchBar(){

        return view("users.APO.search.show");
     }

     
    public function FormView()  {

        return view("users.APO.generate.formRequest");
     }
 
 
    public function getData()  {
 
        $message = 'OOps Not Found !   ( check Option matched with your input data.. ) ';
        $input = $_GET['action'];
 
         if($input == 'order')
         {
             $number = $_GET['number'];

             $status = Apology::where('OrderNumber', $number)->exists();
             if($status)
             {
                $APOData = Apology::where('OrderNumber', $number)->get();
                return view("users.APO.search.show" , compact('APOData'));
             }
             else
               return view('users.APO.search.show' , compact('message'));

         }


         elseif($input == 'id')
         {
             $number = $_GET['number'];
         
             $status = Apology::where('CustomerID', $number  )->exists();
             if($status)
             {
                $APOData = Apology::where('CustomerID', $number  )->get();
                return view("users.APO.search.show" , compact('APOData'));
             }
             else
             return view('users.APO.search.show' , compact('message'));

         }
 
 
     }
 


    public function generate(Request $request)
    {
        

        $agent = $request->Agent;
        $Count_request_agent = Apology::where('AgentName' , $agent)->whereDay('DateGiven',Carbon::now()->day)->count();
        $contactReason = $request->ContactReason ;
        $payment =$request->paidMethod;
        $check = $request->typeRequest;

       if($check == 'on')
       {
        $Request =new agentRequest();
        $Request->AgentName = $request->AgentName;
        $Request->DateGiven = $request->DateGiven;
        $Request->Amount = $request->Apo_Amount;
        $Request->CustomerEmail = $request->CustomerEmail;
        $Request->ContactReason = $request->ContactReason;
        $Request->OrderNumber = $request->OrderNumber;
        $Request->CaseNumber= $request->CaseNumber;
        $Request->CustomerID = $request->CustomerID;
        $Request->status = 'Pending';
        $Request->Channel = $request->Channel;


        $Request->save();
        return redirect()->route('form.view')->with('success' , "Successfully ! Your Request Sent ......... Wait Approval " );
       }
       else
       {

        if($Count_request_agent <= 6)
        {

            if(Apology::where('OrderNumber', $request->OrderNumber )->exists())
            {
            return redirect()->route('form.view')->with('failed' , "this order already compansated before !! , Please check Search tool to find it" );
            }
         
             else
             {

               $Count = Apology::where('CustomerID', $request->CustomerID)->whereMonth('DateGiven', Carbon::now()->month)->count();
               $compensationAMount = Apology::where('CustomerID', $request->CustomerID)->whereMonth('DateGiven', Carbon::now()->month)->sum('Amount');
               $amount = $request->Amount;


               if($Count <= 2 && $compensationAMount < 500 )
               {


                if($contactReason == 'Delivery delay')
                 {

                    if($payment == 'prepaid')
                    {
                        if($amount <= 150) $amount = 25 ;
                        elseif($amount >= 151 && $amount <= 1000 ) $amount = 50 ;
                        elseif($amount >= 1001 && $amount <= 5000 ) $amount = 100 ;
                        elseif($amount > 5000  ) $amount = 200 ;
                    }
                    elseif($payment == 'Cash on Delivery')
                    {

                        if($amount <= 999){
                            return redirect()->route('form.view')->with('failed' , "I am so sorry ! this order amount not eligible to take compensation " );
                        }
                        else
                        {

                            if($amount >= 1000 && $amount <= 5000 ) $amount = 100 ;
                            elseif($amount > 5000  ) $amount = 200 ;
                        }
                         
                    }
                    

                 }
                 elseif ($contactReason == 'Cancellation by Jumia/Seller' || $contactReason == 'Delivery agent misbehaviour/appearance'|| $contactReason == 'Failed Delivery' || $contactReason == 'Late return pickup / Tax invoice'|| $contactReason == 'Late Refund' )
                 {

                    if($amount <= 150) $amount = 25 ;
                    elseif($amount >= 151 && $amount <= 1000 ) $amount = 50 ;
                    elseif($amount >= 1001 && $amount <= 5000 ) $amount = 100 ;
                    elseif($amount > 5000  ) $amount = 200 ;
                 }
                 


               

                  $inputs = Apology::where('Amount',$amount )->where('status' , true)->first();

                  if(isset($inputs->Code))
                  {
                    $inputs->AgentName = $request->AgentName;
                    $inputs->OrderNumber = $request->OrderNumber;
                    $inputs->CustomerID = $request->CustomerID;
                    $inputs->CustomerEmail = $request->CustomerEmail;
                    $inputs->DateGiven = $request->DateGiven;
                    $inputs->ContactReason = $request->ContactReason;
                    $inputs->Channel = $request->Channel;
                    $inputs->CaseNumber = $request->CaseNumber;
                    $inputs->status = false ;
    
                    $inputs->save();
                    return view('users.APO.generate.APOData', compact('inputs'))->with('success' , "Success! Your Action Done Successfully  ");
                  }
                  else
                  return redirect()->route('form.view')->with('failed' , "I am so sorry ! Now this Apology Sold Out , check it later " );
                


              }
              else
              {
                 return redirect()->route('form.view')->with('failed' , "This customer compansated 3 times this Month or Compensation AMount above 500 " );

              }

           
           }

        }

        else
        {
            return redirect()->route('form.view')->with('failed' , "You exceed Your Limit requests for Apology today !! " );
        }

       }   
        
        

    }

    
}
