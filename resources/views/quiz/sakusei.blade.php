@extends('layouts.app')

@section('content')
@auth
    <h1>マジカルBANANA新規作成ページ</h1>
    {!! Form::model($quiz, ['route' => 'quiz.store']) !!}

        {!! Form::label('quiz', 'QUESTION:') !!}
        {!! Form::text('quiz') !!}
        
        {!! Form::label('answer', 'ANSWER:') !!}
        {!! Form::text('answer') !!}

        
        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}
@else
    ログインしてね
@endauth
@endsection