@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student Detail
            <small>Student Information</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div>
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">
                        Back</a>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-default-assign">
                        <span class="fa fa-exchange"></span> Register Course
                    </button>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center">
                                        <img style="display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        width: 50%;" src="{{url('user_images',$student->userimage)}}" alt=""
                                            class="img-responsive img-rounded" width="180" height="180">

                                        <p>
                                            <h3>{{$student->lastname.' '.$student->firstname}}</h3>
                                        </p>
                                        <hr>
                                        <div>Matric. Number : {{$student->regnumber}} </div>
                                        {{-- <div>Gender : {{$student->gender}}
                                    </div> --}}
                                    <div>Email : {{$student->email}} </div>
                                    <div>Phone : {{$student->phone}}</div>
                                    <div>Department :
                                        {{$student->department->name.' - '.$student->department->code}}
                                    </div>

                                    <hr>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="col-md-8">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Registered Courses</h3>
                                    <hr>
                                    <ul class="list-group">
                                        @forelse ($regcourses as $regcourse)
                                        <li class="list-group-item">
                                        {{$regcourse->course->title.' - '.$regcourse->course->code}} <span class="pull-right">{{$regcourse->course->semester->name.', '.$regcourse->course->acadsession}}</span>
                                        </li>
                                        @empty
                                        <p style="background-color: crimson;" class="badge badge-info"><strong>No
                                                Registered Courses yet!</strong></p>
                                        @endforelse
                                    </ul>
                                
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
        </div>
</div>

{{-- Data input modal area for project allocation --}}
<div class="modal fade" id="modal-default-assign">
    <div class="modal-dialog">

        <form action="{{ route('coursereg.store') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="fa fa-exchange"></span> Course Registration</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        

                        <label for="">Course For : {{Auth::user()->lastname.', '.Auth::user()->firstname.' - '.Auth::user()->regnumber}}</label>
                        <input type="hidden"
                            class="form-control" name="user_id"
                            value="{{ Auth::user()->id }}">
                        
                    </div>

                    <div class="form-group">
                        <label>Courses <b style="color: red;">*</b> </label>

                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Course"
                            style="width: 100%;" name="course_id[]">

                            @foreach ($courses as $course)
                            <option value="{{$course->id}}">
                                {{$course->title.' - '.$course->code.' - CRLoad ='.$course->creditload}}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            <!-- /.modal-content -->

        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
{{-- <section class="col-lg-5 connectedSortable"> --}}


{{-- </section> --}}
<!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection