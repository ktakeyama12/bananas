@extends('layouts.app')

@section('content')

    <h1>BANANA新規作成ページ</h1>
    <?php print $message ?>
    <?php print $newbanana->banana . "と言ったら" ?>
    {!! Form::model($banana, ['route' => 'bananas.store'], $newbanana->banana) !!}

        {!! Form::label('banana', 'NAMAE:') !!}
        {!! Form::text('banana') !!}

        <input type="hidden" value="{{$newbanana->banana}}" name="oldbanana" />
        
        
        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}

@endsection