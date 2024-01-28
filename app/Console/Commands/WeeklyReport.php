<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Apology;
use App\Models\weeklyReportChannel;
use Illuminate\Console\Command;

class WeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'channel:weekly-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly Report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
            $startOfWeek = Carbon::now()->startOfWeek();
            $endOfWeek = Carbon::now()->endOfWeek();

            // Retrieve data from the database for the current week
            $dataForCurrentWeek_inbound = Apology::where('Channel' , 'CS Inbound' )->whereBetween('updated_at' , [$startOfWeek ,$endOfWeek ])->count();
            $dataForCurrentWeek_Live = Apology::where('Channel' , 'Live Chat' )->whereBetween('updated_at' , [$startOfWeek ,$endOfWeek ])->count();
            $dataForCurrentWeek_Social = Apology::where('Channel' , 'Social Media' )->whereBetween('updated_at' , [$startOfWeek ,$endOfWeek ])->count();
            $dataForCurrentWeek_IR = Apology::where('Channel' , 'IR Team' )->whereBetween('updated_at' , [$startOfWeek ,$endOfWeek ])->count();
            $dataForCurrentWeek_Sales = Apology::where('Channel' , 'Sales' )->whereBetween('updated_at' , [$startOfWeek ,$endOfWeek ])->count();

            $report = new weeklyReportChannel;
            $report->inbound = $dataForCurrentWeek_inbound ;
            $report->liveChat = $dataForCurrentWeek_Live ;
            $report->socialMedia = $dataForCurrentWeek_Social ;
            $report->IR = $dataForCurrentWeek_IR ;
            $report->Sales = $dataForCurrentWeek_Sales;

            $report->save();

            $this->info('done');

    }
}
