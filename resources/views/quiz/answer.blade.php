@extends('layouts.app')

@section('content')
@auth
    QUESTION:
    <?php print $quiz->quiz; ?>
    
    {!! Form::model($quiz, ['route' => 'quiz.answerinput']) !!}

    {!! Form::label('answerinput', 'ANSWER:') !!}
    {!! Form::text('answerinput') !!}
    
    {!! Form::submit('投稿') !!}
    <br>
    <input type="hidden" value="{{$quiz->answer}}" name="oldanswer" />
    <?php print $message ?>
@else
アカウント作ってね
@endauth
@endsection