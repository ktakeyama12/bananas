@extends('layouts.app')

@section('content')

    <h1>BANANA新規作成ページ</h1>
    <?php print $newbanana->banana . "と言ったら" ?>
    {!! Form::model($banana, ['route' => 'bananas.store']) !!}

        {!! Form::label('banana', 'NAMAE:') !!}
        {!! Form::text('banana') !!}

        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}

@endsection