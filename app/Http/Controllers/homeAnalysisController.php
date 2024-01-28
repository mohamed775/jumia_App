<?php

namespace App\Http\Controllers;

use App\Console\Commands\WeeklyReport;
use App\Models\agentRequest;
use App\Models\Apology;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class homeAnalysisController extends Controller
{
    

    public function HomeAnalysis() {

        // apology amount ( taken and avail )
        $total_25_taken = Apology::where('Status' , 0)->where('Amount' , 25)->count();
        $total_25_avaliable = Apology::where('Status' , 1)->where('Amount' , 25)->count();
        $total_50_taken =Apology::where('Status' , 0)->where('Amount' , 50)->count();
        $total_50_avaliable =Apology::where('Status' , 1)->where('Amount' , 50)->count();
        $total_100_taken = Apology::where('Status' , 0)->where('Amount' , 100)->count();
        $total_100_avaliable = Apology::where('Status' , 1)->where('Amount' , 100)->count();
        $total_150_taken = Apology::where('Status' , 0)->where('Amount' , 150)->count();
        $total_150_avaliable = Apology::where('Status' , 1)->where('Amount' , 150)->count();
        $total_200_taken = Apology::where('Status' , 0)->where('Amount' , 200)->count();
        $total_200_avaliable = Apology::where('Status' , 1)->where('Amount' , 200)->count();
        $total_300_taken = Apology::where('Status' , 0)->where('Amount' , 300)->count();
        $total_300_avaliable =Apology::where('Status' , 1)->where('Amount' , 300)->count();
        $total_400_taken = Apology::where('Status' , 0)->where('Amount' , 400)->count();
        $total_400_avaliable =Apology::where('Status' , 1)->where('Amount' , 400)->count();
        $total_500_taken = Apology::where('Status' , 0)->where('Amount' , 500)->count();
        $total_500_avaliable = Apology::where('Status' , 1)->where('Amount' , 500)->count();

        // channel count request
        $total_request_indound = Apology::where('Channel' , 'CS Inbound')->count();
        $total_request_liveChat = Apology::where('Channel' , 'Live Chat')->count();
        $total_request_social = Apology::where('Channel' , 'Social Media')->count();
        $total_request_IR = Apology::where('Channel' , 'IR Team')->count();
        $total_request_sales =Apology::where('Channel' , 'Sales')->count();

        // channel weekly 
        
        











        ///////////////////////////////////////////////

        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 320])
        ->labels(['Inbound', 'LiveChat' ,'Social' ,'IR' ,'Sales' ])
        ->datasets([
            [
                'backgroundColor' => ['#bb9cf1', '#20b2aa' , '#f08080', '#800080', '#4bda2b'  ],
                'hoverBackgroundColor' => ['#bb9cf1', '#20b2aa', '#f08080', '#800080', '#4bda2b'],
                'data' => [$total_request_indound, $total_request_liveChat , $total_request_social , $total_request_IR , $total_request_sales]
            ]
        ])
        ->options([]);

        $chartjs_2 = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Week_1', 'Week_2', 'Week_3', 'Week_4', 'Week_5', 'Week_6', 'Week_7'])
        ->datasets([
            [
                "label" => "inbound",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(99, 211, 255,1)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "Live Chat",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(99, 130, 255, 1)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ],
            [
                "label" => "Social Media",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(135, 62, 243, 1)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [13, 40, 30, 20, 60, 80, 10],
            ],
            [
                "label" => "IR",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(199, 63, 242, 1)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [30, 30, 50, 60, 70, 80, 90],
            ],
            [
                "label" => "Sales",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(43, 49, 68, 0.50)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [20, 30, 80, 60, 30, 15, 40],
            ]
        ])
        ->options([]);

        return view('dashboard.index' , compact('chartjs' , 'chartjs_2' , 'total_25_taken' ,'total_25_avaliable', 'total_50_taken' 
        ,'total_50_avaliable' , 'total_100_taken' ,'total_100_avaliable' , 'total_150_taken' ,'total_150_avaliable' 
        , 'total_200_taken' ,'total_200_avaliable' , 'total_300_taken' ,'total_300_avaliable' , 'total_400_taken' 
        ,'total_400_avaliable' , 'total_500_taken' ,'total_500_avaliable' ));
    }




}
