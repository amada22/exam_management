<?php

namespace App\Models;
use App\Models\ExaminationRoom;
use App\Models\ExaminationCommittee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
    ];

    public function examinationRooms()
    {
        return $this->belongsToMany(ExaminationRoom::class);
    }

    public function examinationCommittees()
    {
        return $this->belongsToMany(ExaminationCommittee::class);
    }
}
