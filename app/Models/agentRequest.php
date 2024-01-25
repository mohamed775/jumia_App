<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'AgentName',
        'DateGiven',
        'Amount',
        'ContactReason',
        'OrderNumber',
        'CaseNumber',
        'CustomerEmail',
        'CustomerID',
        'status',
        'Channel',
    ];
}
