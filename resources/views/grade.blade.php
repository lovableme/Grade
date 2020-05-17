<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<?php

use App\GradeHandler;


use App\Grade;
use Illuminate\Support\Facades\Auth;
require ('C:\xampp\htdocs\laraproject\resources\views\jdf.php');

$GradeHandler = new GradeHandler();

?>


<span id="date"></span><br>
{{ jdate('Y/m/d')}} <div style="background-color:powderblue">@extends('name')</div>
<script>
  var d = new Date();
  document.getElementById('date').innerHTML = `${d.getHours()} : ${d.getMinutes()}:${d.getSeconds()}`
  setInterval(
    function ()
    {var d = new Date()
      document.getElementById('date').innerHTML = `${d.getHours()} : ${d.getMinutes()}:${d.getSeconds()}`},1000)

</script>
<style>
  textarea{
  box-shadow: 2px 2px 7px;
  resize: none;
}
  abbr{
        text-decoration: none !important;
        cursor: default !important;
    }
</style>
@section('content')
    <div class="alert"> {{session()->get('message') ?? ''}}</strong></div>
@can('viewAny',Grade::class)
<div style="direction:rtl;width:80%;margin:auto">
<p style="text-align:center">برای اعتراض به هر درس روی ان کلیک کنید.</p>
<table class="table" border="1" style="
    width:50%;
    margin-right:auto;
    margin-left:auto">
    <tr class="table-active">
      <td>
        نام درس
      </td>
      <td>
        نمره
      </td>
      <td>
        وضعیت ثبت
      </td>
    </tr>
    <tr>
      <td>
        math
      </td>

      <td>
        @can('CanDenounceMath',Grade::class)
            <a href="../grade/denounce/math">
              @endcan
              <abbr title="{{$GradeHandler->Dates()[0]}}مهلت اعتراض">

              {{$GradeHandler->LessonFinder()['math']->grade ?? ''}}
            </a>
          </abbr>
      </td>

      <td>{{$GradeHandler->LessonFinder()['math']->reg_st ? 'ثبت نهایی': 'ثبت موقت'  ?? ''}}</td>
    </tr>

    <tr>
      <td>
        اندیشه 1
      </td>

      <td>
        @can('CanDenounceRel',Grade::class)
            <a href="../grade/denounce/rel">
        @endcan
              <abbr title="{{$GradeHandler->Dates()[1]}}مهلت اعتراض">
                {{$GradeHandler->LessonFinder()['rel']->grade?? ''}}
            </a>
          </abbr>
      </td>

      <td>
        {{$GradeHandler->LessonFinder()['rel']->reg_st  ? 'ثبت نهایی': 'ثبت موقت'  ?? ""}}
      </td>
    </tr>

    <tr>
      <td>
        شیمی
      </td>
      <td>
        @can('CanDenounceChim',Grade::class)
            <a href="../grade/denounce/chim">
        @endcan
        <abbr title="{{$GradeHandler->Dates()[2]}}مهلت اعتراض">
              {{$GradeHandler->LessonFinder()['chim']->grade  ?? ''}}
            </a>
          </abbr>
      </td>
      <td>
        {{$GradeHandler->LessonFinder()['chim']->reg_st ? 'ثبت نهایی': 'ثبت موقت'  ?? ""}}
      </td>

    </tr>
    <tr>
      <td>
         فیزیک1
        </td>
        <td>

              @can('CanDenouncePhys',Grade::class)
            <a href="../grade/denounce/phys">
              @endcan
              <abbr title="{{$GradeHandler->Dates()[3]}}مهلت اعتراض">

              {{$GradeHandler->LessonFinder()['phys']->grade ?? ''}}
            </a>
              </abbr>
        </td>
        <td>
            {{$GradeHandler->LessonFinder()['phys']->reg_st ? 'ثبت نهایی': 'ثبت موقت' ?? ""}}
        </td>
    </tr>

</table>


@endcan
@can('professor',Grade::class)

<div style="direction:rtl;width:50%;margin:auto;font-family:nazanin">

<form method="GET" action="/finalreg/{{$GradeHandler->FindUser()->profession}}" >
  @csrf
    <h1 style='text-align:center'>نمرات دانشجویان</h1>
    </br>

        <div class="card" style="text-align: right">
    @foreach($GradeHandler->all_students() as $all)
            <div class="card-header">
            <strong style="position:relative;bottom:5px">
          {{$all->name}}
      </strong>
        </div>
        <br>
    <?php $profession = $GradeHandler->FindPro()?>
        <div class="card-body">
      نمره ی درس<input style="position:relative;right:0px"  {{$GradeHandler->DAndR($GradeHandler->FindUser()->profession)['disablity_val']}}  type="number" value="{{$all->$profession->grade ?? ''}}" name= "{{$all->name}}"/>
      </br><br>
      <span>اعتراض دانشجو</span>
      <textarea readonly  >
          {{$all->denounce[$GradeHandler->DAndR($GradeHandler->FindUser()->profession)['denounce']]}}
      </textarea>
        </br>
      پاسخ به اعتراض
        <textarea {{$GradeHandler->DAndR($GradeHandler->FindUser()->profession)['disablity_val']}} type="text" name="{{$all->uni_num}}"  >
            {{$all->denounce[$GradeHandler->DAndR($GradeHandler->FindUser()->profession)['reply']]}}
        </textarea>
      </br></br></br></br>
        </div>
    @endforeach

        </div>
    <input type="hidden" value="{{$GradeHandler->FindUser()->profession}}" name="lName" >
    <input type="submit" class="btn btn-success" value="ثبت موقت ">
</form>


</div>

</div>
 @endcan
<a class="btn btn-danger" href="home">back</a>

@endsection
