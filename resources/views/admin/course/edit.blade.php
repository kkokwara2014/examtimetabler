@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Course
            <small>Modify Course</small>
        </h1>
        {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <a href="{{ route('course.index') }}" class="btn btn-success">
                    <span class="fa fa-eye"></span> All Courses
                </a>
                <br><br>

                <div class="row">
                    <div class="col-md-7">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('course.update',$courses->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}

                                    <div class="form-group">
                                        <label for="">Course Title <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" name="title" value="{{$courses->title}}"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Course code <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" name="code" value="{{$courses->code}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Credit Load</label>
                                        <input type="text" class="form-control" name="creditload"
                                            value="{{$courses->creditload}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Semester</label>
                                        <select name="semester_id" class="form-control">
                                            <option selected="disabled">Select Semester</option>
                                            @foreach ($semesters as $semester)

                                            <option value="{{$semester->id}}"
                                                {{$semester->id==$courses->semester_id ? 'selected':''}}>
                                                {{$semester->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Acad. Session</label>
                                        <input type="text" class="form-control" id="datepickeryear" name="acadsession"
                                            value="{{$courses->acadsession}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Department</label>
                                        <select name="department_id" class="form-control">
                                            <option selected="disabled">Select Department</option>
                                            @foreach ($departments as $department)

                                            <option value="{{$department->id}}"
                                                {{$department->id==$courses->department_id ? 'selected':''}}>
                                                {{$department->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Lecturer</label>
                                        <select name="user_id" class="form-control">
                                            <option selected="disabled">Select Lecturer</option>
                                            @foreach ($lecturers as $user)

                                            <option value="{{$user->id}}"
                                                {{$user->id==$courses->user_id ? 'selected':''}}>
                                                {{$user->lastname.', '.$user->firstname}}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-default">Cancel</a>

                            </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
        </div>
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