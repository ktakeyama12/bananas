<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Quiz;
use App\User;
use App\Banana;
use DB;
class QuizController extends Controller
{
    public function sakusei()
    {
        $quiz = new Quiz;
        return view('quiz.sakusei', [
            'quiz' => $quiz,
        ]);
    }
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
        $user_id = \Auth::user();
        $quiz = new Quiz;
        $quiz->quiz = $request->quiz;
        $quiz->answer = $request->answer;
        $quiz->nameshutsudai = $user_id->name;
        $quiz->namekaitou = "0";
        $quiz->save();
        return redirect('/');
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
    
    public function answer(){
        $quiz = Quiz::inRandomOrder()->select('quiz')->first();
        return view('quiz.answer', [
            'quiz' => $quiz,
        ]);
    }
}
