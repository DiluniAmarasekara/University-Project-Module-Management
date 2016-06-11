@extends('masterpages.master_rpc')
@section('content_header')

@stop

@section('content_sub_header')

@stop


@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Monthly Feedback</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

@section('subheader')
    <h5>Submit Monthly Feedback</h5>
@endsection
@section('content')

    @if(Session::has('message'))
        <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
    @endif


    <form action="" method="post" >

        <div class="form-group white-bg"> <table border="0">
                <tr> <td class="col-sm-10">

                        <label for="panel" >Student_ID</label>

                    {{--<td width="200"><input type="text"  width="300"name="st_id" class="form-control" id="panel2" placeholder="student_id" />--}}
                   <input type="text" name="st_id" class="form-control">
                        @if ($errors->has('st_id'))
                            <p class="help-block">
                                <font color="red">{{ $errors->first('st_id') }}</font>
                            </p>
                        @endif
                    </td>

                    <!---->

                    <div class="form-group"><label class="col-sm-2 control-label">Student_ID</label>


                        <div class="col-sm-10">
                            <select class="form-control m-b" name="searchdropdown" id="searchdropdown" onchange="selectUser()">

                                @foreach($studentd as $st)
                                {
                                   {{--// $category = htmlspecialchars($category);--}}
                                    <option value="{{$st->regId}}">{{$st->regId}}</option>
                                }
                                @endforeach

                            </select>


                        </div>

                    </div>
                    <!---->




                </tr>



                <tr> <td class="col-sm-10"><label for="panel" >Project_ID</label>



                    {{--<td>--}}{{--<input type="text" name="project_id" class="form-control" id="panel3" placeholder="project_id" />--}}
                   <input type="text" name="project_id" class="form-control">
                        @if ($errors->has('project_id')) <p class="help-block"><font color="red">{{ $errors->first('project_id') }}</font></p> @endif</td>

                </tr>

                <tr> <td class="col-sm-10"> <label for="panel" >Date</label>

                   <input type="text" name="dt" class="form-control" id="panel4" value="<?php $dte= new DateTime();echo $dte->format('Y-m-d '); ?>"  /></td>


                </tr>

                <tr> <td class="col-sm-10"> <label for="panel" >Feedback</label>
                    <textarea name ="feedback" rows="5" cols="50" placeholder="feedback"  input type="text" class="form-control"></textarea>
                        @if ($errors->has('feedback')) <p class="help-block"><font color="red">{{ $errors->first('feedback') }}</font></p> @endif</td>

                </tr>
                <tr>

                    <td> <label for="panel" ></label>
                </tr>
<tr>
                <td class="col-sm-10"><button type="submit" class="btn btn-w-m btn-primary" name="add ">Submit</button></td>
                </tr>
            </table>
        </div>

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </form>
@stop                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  