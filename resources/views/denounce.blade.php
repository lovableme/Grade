<?php
use App\User;

$id = auth()->id();
$stu = User::find($id);
$denounce = $stu->denounce;

$lesson = $dars.'_d';
$reply= $dars . '_r';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
    textarea{
        position: relative;
        left:auto;
        right:auto
    }
    form{
        text-align: center;
        
    }
</style>
@extends('name')
@section('content')
<br><br><br>
@if(session()->get('message'))
<div class="alert alert-success" style="text-align:right">{{session()->get('message') }}</div>
@endif

<form style="margin:auto;width:90%" method="POST" action="{{route('sabt',$dars)}}">
    @csrf
   اعتراض : <textarea rows=2 cols=80 width="200" height="400"   type="text" name="{{$dars}}" id="">{{$denounce->$lesson}}</textarea>
    </br>
</br>
  نتیجه ی اعتراض  <textarea disabled rows=5 cols=80 size="15"   type="text" name="{{$reply}}" id="">{{$denounce->$reply}}</textarea></br>
    <input type="submit" value="تایید">
</form>
<a href="/grade" type="button" /> back</a>  
@endsection