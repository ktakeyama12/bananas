@extends('layouts.app')

@section('content')

    <h1>マジカルBANANA新規作成ページ</h1>
   @auth
    <?php print $newbanana->banana . "と言ったら" ?>
    {!! Form::model($banana, ['route' => 'bananas.store'], $newbanana->banana) !!}

        {!! Form::label('banana', 'NAMAE:') !!}
        {!! Form::text('banana') !!}

        <input type="hidden" value="{{$newbanana->banana}}" name="oldbanana" />
        
        
        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}
     <?php
     if($message=="fail"){
         print "もう" . $name->name . "さんが投稿してたよ..."
         ?><br><?php
     }
     if($all){
         for($i=0;$i<count($all);$i++){
             print $all[$i] . " by " . $namelog[$i];
             ?><br><?php
         }
     }
     
     ?>
     @else
     ログインしてね
     @endauth
@endsection