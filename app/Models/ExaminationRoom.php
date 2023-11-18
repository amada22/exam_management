<?php

namespace App\Models;
use App\Models\Candidate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'capacity',
    ];

    
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class);
    }

}
