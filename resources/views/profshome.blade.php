<?php 
use Illuminate\Support\Facades\Auth;
use App\User;
?>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    
                    ?>
                    <table border=1>
                        <tr>
                            <td>  تخصص </td>
                            <td> {{auth()->user()->profession}}</td>
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
             
                <a href="grade"> نمرات دانشجویان</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="resources/js/app.js"></script>
@endsection


