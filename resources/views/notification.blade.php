<?php use \Illuminate\Support\Facades\Session; ?>

<style>
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    .isa_info, .isa_success, .isa_warning, .isa_error {
        margin: 10px 0px;
        padding:12px;

    }

    .isa_success {
        color: #4F8A10;
        background-color: #DFF2BF;
    }

    .isa_processing {
        color: blue;
        background-color: lightskyblue;
    }


    .isa_error {
        color: #D8000C;
        background-color: #FFD2D2;
    }
    .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
        margin:10px 22px;
        font-size:2em;
        vertical-align:middle;
    }
</style>

<div id="notification-container">
    @if(Session::has('success'))
        <div class="isa_success" align="center">
            <i class="fa fa-check"></i>
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="isa_error" align="center">
            <i class="fa fa-times-circle"></i>
            {{Session::get('error')}}
        </div>
    @endif

    @if(Session::has('processing'))
        <div class="isa_processing" align="center">
            <i class="fa fa-spinner"></i>
            {{Session::get('processing')}}
        </div>
    @endif
</div>

