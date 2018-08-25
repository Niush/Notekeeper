<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Note;

class NoteController extends Controller
{
    public function note(){
        return redirect()->route('home');
    }

    public function new(Request $request){
        if($request->isMethod('post')){
            $this->validate(
                $request,
                [
                    'title'=>'required|min:5|max:100',
                    'note'=>'required|min:10|max:255'
                ]
            );

            $data = [];
            $data['title'] = $request->input('title');
            $data['note'] = $request->input('note');
            $data['user_id'] = Auth::user()->id;
            $data['edits'] = 1;
            $data['deleted'] = 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            DB::table('notes')->insert($data);
            return redirect()->route('home')->with('msgS','New Note Added, Great !!');
            // DB::table('notes')->insert($data)->where([$user_id=>Auth::user()->id]);
        }
    }

    public function delete($id, Request $request){
        if($request->isMethod('post')){
            if(DB::table('notes')->where('id', $id)->where('user_id', Auth::user()->id)){
                DB::table('notes')->where('id', $id)->where('user_id', Auth::user()->id)->update(array('deleted' => 1));
            }else{
                return redirect()->route('home')->with('msgE','Delete Failed.');
            }
        }else if($request->isMethod('get')){
            return redirect()->route('home')->with('msgE','Delete Failed.');
        }
        return redirect()->route('home')->with('msgS','Note Delete Success. Moved To Trash.');
    }

    public function trash(Note $note){
        $data = [];
        try{
            if(DB::table('notes')->where('user_id',Auth::user()->id)){
                $note_fetch = DB::table('notes')->where('user_id',Auth::user()->id)
                    ->where('deleted',1)
                    ->get();
            }else{
                return redirect()->route('home');
            }
        }catch(\Exception $e){
            return redirect()->route('home');
        }
        $data = $note_fetch;
        return view('trash')->with('data',$data);
    }

    public function restore($id, Request $request){
        if($request->isMethod('post')){
            DB::table('notes')->where('id', $id)->where('user_id', Auth::user()->id)->update(array('deleted' => 0));
        }
        return redirect()->route('home')->with('msgS','Note Restored Successfully.');
    }

    public function edit($id, Note $note, Request $request){
        $data = [];
        if($request->isMethod('post')){
            $this->validate(
                $request,
                [
                    'title'=>'required|min:5|max:100',
                    'note'=>'required|min:10|max:255',
                    'id'=>'required'
                ]
            );

            $edit_note = $note->find($id);

            $edit_note->title = $request->input('title');
            $edit_note->note = $request->input('note');
            $edit_note->edits = $request->input('edits') + 1;
            $edit_note->updated_at = date('Y-m-d H:i:s');
            $edit_note->save();

            return redirect()->route('home')->with('msgS','Note Edited Successfully.');
        }else{
            if($note->find(Auth::user()->id)){
                $note_fetch = $note->find(Auth::user()->id)->where('user_id', Auth::user()->id)->where('id', $id)->get();
                if(sizeof($note_fetch) > 0){
                    $data['title'] = $note_fetch[0]['title'];
                    $data['note'] = $note_fetch[0]['note'];
                    $data['id'] = $note_fetch[0]['id'];
                    $data['edits'] = $note_fetch[0]['edits'];
                }else{
                    return redirect()->route('home')->with('msgE','Invalid Note Chosen.');
                }
            }else{
                return redirect()->route('home')->with('msgE','Invalid Note Chosen.');
            }
        }
        return view('edit', $data);
    }

}
