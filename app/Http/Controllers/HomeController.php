<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Note;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Note $note)
    {
        $data = [];
        //DB::table('notes')->find(Auth::user()->id);
        try{
            if(DB::table('notes')->where('user_id',Auth::user()->id)){ 
                $note_fetch = DB::table('notes')->where('user_id',Auth::user()->id)
                    ->where('deleted',0)
                    ->get();
            }else{
                return view('home')->with('data',$data);
            }
        }catch(\Exception $e){
            return view('home')->with('data',$data);
        }
        //return $note_fetch;
        $data = $note_fetch;
        return view('home')->with('data',$data);
    }
}
