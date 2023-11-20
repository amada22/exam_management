<?php

namespace App\Http\Controllers;

use App\Models\ExaminationCommittee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExaminationCommitteeController extends Controller
{
    public function index(){
  
        //$ExaminationCommittee = ExaminationCommittee::all();
        $jsonData = ExaminationCommittee::select('Supervisors','committee_name','id')->get();
        
        return view('Examination_committees', ['ExaminationCommittees'=>$jsonData]);
    }


    public function store(Request $req){

        $req->validate([
            'committee_name' => 'required|string',
            'supervisors' => 'required|array',
            'supervisors.*' => 'required|string',
        ]);

        $committeeName = $req->input('committee_name');
        $supervisors = $req->input('supervisors');

        
        $committee = ExaminationCommittee::updateOrCreate(
            ['committee_name' => $req->input('committee_name')],
            ['supervisors' => json_encode($req->input('supervisors'))]
        );

        return redirect()->back();
    }

    public function delete($id){

        DB::statement('DELETE FROM candidate_examination_committee WHERE examination_committee_id = ?', [$id]);

        $ExaminationCommittee = ExaminationCommittee::findOrFail($id);
        $ExaminationCommittee->delete();

 


        return redirect()->back();
    }

    public function update(Request $req , $id){


        $req->validate([
            'committee_name' => 'required|string',
            'supervisors' => 'required|array',
            'supervisors.*' => 'required|string',
        ]);
        
        $committeeName = $req->input('committee_name');
        $supervisors = $req->input('supervisors');
        
       
        $committee = ExaminationCommittee::updateOrCreate(
            ['id' => $id],
            [
                'committee_name' => $committeeName,
                'supervisors' => json_encode($supervisors),
            ]
        );

        return redirect()->route('index');
    }

    public function modify($id){
  
        $ExaminationCommittee = ExaminationCommittee::find($id);

        return view('Examination_Committee_update', ['ExaminationCommittee'=>$ExaminationCommittee]);
    }

}
