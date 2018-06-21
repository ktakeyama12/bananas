@extends('layouts.app')

@section('content')

    <h1>マジカルBANANA新規作成ページ</h1>
   
    <?php print $newbanana->banana . "と言ったら" ?>
    {!! Form::model($banana, ['route' => 'bananas.store'], $newbanana->banana) !!}

        {!! Form::label('banana', 'NAMAE:') !!}
        {!! Form::text('banana') !!}

        <input type="hidden" value="{{$newbanana->banana}}" name="oldbanana" />
        
        
        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}
     <?php
     if($message=="fail"){
         print "もう" . $name->name . "さんが投稿してたよ...";
     }
     if($all){
         for($i=1;$i<count($all);$i++){
             print $all[$i] . " by " . $namelog[$i];
             ?><br><?php
         }
     }
     
     ?>
@endsection