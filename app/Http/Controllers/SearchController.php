<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;

class SearchController extends Controller
{
    public function search($query, Note $note){
        if(true){
            return $note->find(Auth::user()->id);
            $note_fetch = $note->find(Auth::user()->id)
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
