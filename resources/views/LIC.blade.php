@extends('masterpages.master_rpc')
@section('css_links')

    <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">



    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">

    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) ;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) ;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>

@stop

@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Register Lecturer In charge</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

{{--@section('subheader')--}}
    {{--<h5>Register External Supervisor</h5>--}}
{{--@endsection--}}



@section('content')


    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert" id="divAlert" style="font-size: 14px">
   @foreach ($errors->all() as $msg)
      <li> {{ $msg }} </li>
        @endforeach
    </div>
    @endif

    @if(Session::has('message_success'))

    <script>
        swal("Registered!", "{{ Session::get('message_success') }}", "success");
    </script>

    <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
        <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
    </div>
    @endif

    @if(Session::has('message_error'))

        <script>
            swal("Error!", "{{ Session::get('message_error') }}", "error");
        </script>

        <div class="alert alert-error" role="alert" id="divAlert" style="font-size: 14px">
            <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_error') }}
        </div>
    @endif

    {{--{!! Form::open(array('route'=>'RegSup_store','class'=>'form', 'files'=>true ))!!}--}}
    {!! Form::open(array('url'=>'/LIC','method'=>'POST', 'class'=>'wizard-big', 'id'=>'form', 'enctype'=>'multipart/form-data')) !!}
        <div class="form-group">
            {!!Form::label('Full Name')!!}<br />
            {!!Form::text('lectureInCharge_fullName',null,array('required','class'=>'form-control','placeholder'=>'Your Full Name'))!!}


    </div>

    <div class="form-group">
        {!!Form::label('Contact Number')!!}<br />
        {!!Form::text('lectureInCharge_contactNumber',null,array('required','class'=>'form-control','placeholder'=>'Contact Number'))!!}


    </div>



    <div class="form-group">
        {!!Form::label('Email')!!}<br />
        {!!Form::email('lectureInCharge_email',null,array('required|email','class'=>'form-control','placeholder'=>'Your Email address'))!!}

    </div>

    <div class="form-group">
        {!!Form::label('Speciality')!!}<br />
        {!!Form::text('lectureInCharge_speciality',null,array('required','class'=>'form-control','placeholder'=>'Specialized field'))!!}

    </div>

   
    {{--<div class="form-group">--}}
        {{--{!!Form::label('User Name')!!}<br />--}}
        {{--{!!Form::text('username',null,array('required','class'=>'form-control','placeholder'=>'Select a username for login '))!!}--}}

    {{--</div>--}}
    <div class="form-group">
        {!!Form::label('Password')!!}<br />
        {{--{!!Form::password('password',null,array('required','class'=>'form-control','placeholder'=>'Select your password',))!!}--}}
        <input id="password" type="password" name="password" placeholder="Password" class="form-control required" />
    </div>

    <div class=form-group">
        {!!Form::submit('Submit', array('class'=>'btn btn-primary'))!!}
    </div>

    {!!Form::close()!!}

@endsection


@section('ValidationJavaScript')
    <script>
        function validate(evt) {

            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;

                if(theEvent.preventDefault) {
                    $('#teliv').addClass('has-error');
                    theEvent.preventDefault();
                }
            }else{
                $('#teliv').removeClass().addClass('form-group has-success');
            }

            $("#phone").attr('maxlength','10');

        }
    </script>
    @endsection



