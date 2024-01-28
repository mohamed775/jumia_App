<?php

namespace App\Http\Controllers;
use App\Models\agentRequest;
use App\Models\Apology;
use App\Models\User;
use Illuminate\Http\Request;

class homeAnalysisController extends Controller
{
    

    public function HomeAnalysis() {


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
       



        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [69, 59]
            ]
        ])
        ->options([]);

        $chartjs_2 = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [13, 40, 30, 20, 60, 80, 10],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [3, 3, 3, 2, 3, 3, 0],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [2, 2, 2, 2, 2, 2, 2],
            ]
        ])
        ->options([]);

        return view('dashboard.index' , compact('chartjs' , 'chartjs_2' , 'total_25_taken' ,'total_25_avaliable', 'total_50_taken' 
        ,'total_50_avaliable' , 'total_100_taken' ,'total_100_avaliable' , 'total_150_taken' ,'total_150_avaliable' 
        , 'total_200_taken' ,'total_200_avaliable' , 'total_300_taken' ,'total_300_avaliable' , 'total_400_taken' 
        ,'total_400_avaliable' , 'total_500_taken' ,'total_500_avaliable' ));
    }




}
