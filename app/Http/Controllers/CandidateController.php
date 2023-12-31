<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    public function index(){
  
        $candidates = Candidate::all();
        
        return view('candidate', ['candidates'=>$candidates ]);
    }


    public function store(Request $req){

        $validatedData = $req->validate([
            'name' => 'required|max:255',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
        
        ]);

        Candidate::create($validatedData);

        return redirect()->back();
    }

    public function delete($id){


        DB::statement('DELETE FROM candidate_examination_committee WHERE candidate_id = ?', [$id]);
        DB::statement('DELETE FROM candidate_examination_room WHERE candidate_id = ?', [$id]);

        $candidate = Candidate::findOrFail($id);
        $candidate->delete();


        return redirect()->back();
    }

    public function update(Request $req , $id){


        $req->validate([
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
          
        ]);

        $candidate = Candidate::findOrFail($id);

        $candidate->update([
            'name' => $req->input('name'),
            'first_name' => $req->input('first_name'),
            'last_name' => $req->input('last_name'),
       
        ]);

        return redirect()->route('index_C');
    }

    public function modify($id){
  
        $candidate = Candidate::find($id);

        return view('update.update_candidate', ['candidate'=>$candidate]);
    }



}
