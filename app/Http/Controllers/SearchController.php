<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
use DB;

class SearchController extends Controller
{
    public function search($query, Note $note){
        if(true){
            return DB::table('notes')->get();
            $note_fetch = DB::table('notes')->find(Auth::user()->id)
            ->where('user_id',Auth::user()->id)
            ->where('deleted',0)
            ->where(function($continue) use ($query) {
                $continue->where('title','LIKE','%'.$query.'%')
                ->orWhere('note','LIKE','%'.$query.'%');
            })
            ->get();
        }else{
            $note_fetch = ['No Result'];
        }
        return $note_fetch;
    }
}
