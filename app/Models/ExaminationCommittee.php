<?php


namespace App\Models;
use App\Models\Candidate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'committee_name',
        'supervisors',
    ];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class);
    }
}
