<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apology extends Model
{
    use HasFactory;

    protected $fillable = [
        'WeekIssued',
        'Code',
        'Amount',
        'ExpaireDate',
    ];
}
