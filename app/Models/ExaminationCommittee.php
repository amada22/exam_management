<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'committee_name',
        'supervisors',
    ];

    
}
