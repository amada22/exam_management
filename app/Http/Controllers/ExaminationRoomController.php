<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExaminationRoom;
use Illuminate\Support\Facades\DB;

class ExaminationRoomController extends Controller
{
    public function index(){
  
        $ExaminationRoom = ExaminationRoom::all();
        
        return view('Examination_Room', ['ExaminationRooms'=>$ExaminationRoom ]);
    }


    public function store(Request $req){

        $validatedData = $req->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|max:100',
                    
        ]);

        ExaminationRoom::create($validatedData);

        return redirect()->back();
    }

    public function delete($id){

        DB::statement('DELETE FROM candidate_examination_room WHERE examination_room_id = ?', [$id]);

        $ExaminationRoom = ExaminationRoom::findOrFail($id);
        $ExaminationRoom->delete();


        return redirect()->route('index_R');
    }

    public function update(Request $req , $id){


        $req->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|max:100',
          
        ]);

        $ExaminationRoom = ExaminationRoom::findOrFail($id);

        $ExaminationRoom->update([
            'name' => $req->input('name'),
            'capacity' => $req->input('capacity'),
            
       
        ]);

        return redirect()->route('index_R');
    }

    public function modify($id){
  
        $ExaminationRoom = ExaminationRoom::find($id);

        return view('update.Examination_Room_update', ['ExaminationRoom'=>$ExaminationRoom]);
    }


}
