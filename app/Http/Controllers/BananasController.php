<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;
use App\Banana;
use DB;
class BananasController extends Controller
{
    public function create()
    {
        
        $banana = new Banana;
        $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        $all = DB::table('bananas')->orderBy('updated_at', 'desc')->pluck('banana');
        $namelog = DB::table('bananas')->orderBy('updated_at', 'desc')->pluck('name');
        
        return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
            'message' => "",
            'all' => $all,
            'namelog' => $namelog,
        ]);
    }
    public function store(Request $request)
    {
        $user_id = \Auth::user()->id;
        $nameeat = \Auth::user()->name;
        $check = DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        $name = DB::table('users')->where('id',$check->userid)->first();
        $all = DB::table('bananas')->orderBy('updated_at', 'desc')->pluck('banana');
        $namelog = DB::table('bananas')->orderBy('updated_at', 'desc')->pluck('name');
        if($request->oldbanana!=$check->banana){
            $banana = new Banana;
            $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
            return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
            'message' => "fail",
            'name' => $name,
            'all' => $all,
            'namelog' => $namelog,
            ]);
        }else{
        
        $banana = new Banana;
        $banana->banana = $request->banana;
        $banana->userid = $user_id;
        $banana->done = "0";
        $banana->name = $nameeat;
        $banana->save();
        $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        $banana = new Banana;
        return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
            'message' => "sucesss",
            'all' => $all,
            'namelog' => $namelog,
        ]);
    }
    }

    public function shokika()
    {
        Banana::truncate();
        $banana = new Banana;
        $banana->banana = "バナナ";
        $banana->userid = "10000";
        $banana->done = "0";
        $banana->name = " ";
        $banana->save();
        return redirect('/');
         
    }
}
