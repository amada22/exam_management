<?php

namespace App\Http\Controllers;
use App\Models\ExaminationRoom;
use App\Models\ExaminationCommittee;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistributionController extends Controller
{

    public function master(){
  
        return view('master');
    }

    public function index(){
  
        $candidates = Candidate::with(['examinationRooms', 'examinationCommittees'])
        ->orderBy('name')
        ->get();

        $Room = ExaminationRoom::with(['candidates'])
        ->get();
        
        
        return view('distribution', ['candidates'=>$candidates ,'rooms'=>$Room ]);
    }


    public function deleteDistribution(Request $request)
{

    DB::statement('DELETE FROM candidate_examination_committee');

 
    DB::statement('DELETE FROM candidate_examination_room');
   
    return redirect()->back();

    
}


    public function autoAssignRoomsAndCommittees()
    {
       
        $candidates = Candidate::orderBy('name')->get();
        $examinationRooms = ExaminationRoom::all();
        $examinationCommittees = ExaminationCommittee::all();

        
        foreach ($candidates as $key => $candidate) {
            
            $roomIndex = $key % $examinationRooms->count();
            $committeeIndex = $key % $examinationCommittees->count();

           
            $selectedRoom = $examinationRooms[$roomIndex];
            $selectedCommittee = $examinationCommittees[$committeeIndex];

            
            $candidate->examinationRooms()->attach($selectedRoom->id);
            $candidate->examinationCommittees()->attach($selectedCommittee->id);
        }

        return redirect()->back();
    }
}

