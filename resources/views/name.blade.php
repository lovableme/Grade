
<?php
use Illuminate\Support\Facades\Auth;

?>

<div style='direction:rtl'>
        نام کاربر : {{auth()->user()->name}}
        @yield('content')
</div>
