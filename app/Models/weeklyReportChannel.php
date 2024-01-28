<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weeklyReportChannel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inbound',
        'liveChat',
        'socialMedia',
        'IR',
        'Sales'
    ];
}
