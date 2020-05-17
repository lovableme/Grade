<?php
use Illuminate\Support\Facades\Auth;
use App\User;
?>

@extends('layouts.app')

@section('content')
    <div style="direction: rtl;float:right;display:block;background-color: #3f9ae5">
         نام کاربر: <b>{{auth()->user()->name}}</b>

    </div>
    <br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div style="float:right;direction: rtl;padding-right: 0px;"  class="container row">
    <div style="margin-left: 30px" gap="2" class="dropdown col-sm-2 col-xs-1">
        <div  >
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
گزینه ها            </button>
            <div class="dropdown-menu">
                <div id = "info">
                     اطلاعات جامع دانشجو>
                     <div>
                            <a style="display:none" id="grade" href="grade">نمرات</a>
                    </div>
                </div>


                <span>

                    <a method="post" href="/changepass">تغییر رمز کاربری</a>
                </span><br>
                <span>
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">خروج</a>
                </span>
            </div>
        </div>

    </div>

    <div class="row justify-content-center col-sm-8 col-xs-11">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">داشبورد</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    $user = auth()->user()->id;
                    $use = User::find($user)->professor;
                    $proname=$use->name;
                    $teacher = User::find($user);

                    $status = User::find($user)->education_status;
                    ?>
                @if($use)

                    <table class="table table-striped" border=1>
                        <tr>
                            <td> نام استاد راهنما</td>
                            <td>وضعیت تحصیلی </td>
                        </tr>
                        <tr>
                            <td>{{$proname }}</td>
                            <td>  {{$status}}</td>
                        </tr>

                    </table>
                @endif
                </div>
            </div>
        </div>

    </div>
<script>
    $(document).ready(
        function()
        {$('#info').mouseenter(
            function(){
                $('#grade').css('display','block')
            }
        );
        $('#info').mouseleave(
            function(){
                $('#grade').css('display','none')
            }
        );}

    )

</script>
</div>
@endsection

