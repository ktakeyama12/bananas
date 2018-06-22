@extends('layouts.app')

@section('content')
@auth
    QUESTION:
    <?php print $quiz->quiz;
    
 
    ?>
    
    {!! Form::model($quiz, ['route' => 'quiz.answerinput']) !!}

    {!! Form::label('answerinput', 'ANSWER:') !!}
    {!! Form::text('answerinput') !!}
    
    {!! Form::submit('投稿') !!}
    <br>
    <input type="hidden" value="{{$quiz->answer}}" name="oldanswer" />
    <?php
        if($message=="正解" or $message==""){
            print $message;
        }else{
            print "答えは" . $message . "でした";
        }
    ?>
@else
アカウント作ってね
@endauth
@endsection