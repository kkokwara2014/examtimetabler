@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Course
            <small>All Courses</small>
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
                {{-- @if (Auth::user()->role->id==4) --}}

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <span class="fa fa-plus"></span> Add Course
                </button>

                {{-- <a href="{{route('chapter.index')}}" class="btn btn-success"><span class="fa fa-eye"></span>
                Chapters
                </a> --}}
                {{-- @endif --}}


                {{-- @if (Auth::user()->role->id==2)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-assign">
                    <span class="fa fa-exchange"></span> Assign Project
                </button>
                <a href="{{route('project.allocated')}}" class="btn btn-success"><span class="fa fa-eye"></span>
                Allocated Projects</a>
                @endif

                <br><br> --}}

                <div class="row">
                    <div class="col-md-12">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                @if (count($courses)>0)

                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Credit Load</th>
                                            <th>Semester</th>
                                            <th>Acad. Session</th>
                                            <th>Department</th>
                                            <th>Taught By</th>

                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                        {{-- @if
                                        ($course->user->id==Auth::user()->id||Auth::user()->role->id==1||Auth::user()->role->id==2) --}}
                                        <tr>
                                            <td>{{$course->title}}</td>
                                            <td>{{$course->code}}</td>
                                            <td>{{$course->creditload}}</td>
                                            <td>{{$course->semester->name}}</td>
                                            <td>{{$course->acadsession}}</td>
                                            <td>{{$course->department->code}}</td>
                                            <td>{{$course->user->lastname.', '.$course->user->firstname}}</td>
                                            {{-- <td>{{$course->user->lastname.', '.$course->user->firstname.' - '.$course->user->identitynumber}} --}}
                                            </td>
                                            {{-- <td style="text-align: center">
                                                <a href="{{ route('course.show',$course->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td> --}}

                                            <td style="text-align: center">
                                                {{-- @if ($course->user->id==Auth::user()->id) --}}
                                                <a href="{{ route('course.edit',$course->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span>
                                                </a>
                                                {{-- @endif --}}
                                            </td>

                                            <td style="text-align: center">
                                                <form id="delete-form-{{$course->id}}" style="display: none"
                                                    action="{{ route('course.destroy',$course->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$course->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                                </a>

                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Credit Load</th>
                                            <th>Semester</th>
                                            <th>Acad. Session</th>
                                            <th>Department</th>
                                            <th>Taught By</th>

                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                @else
                                <p class="alert alert-info">No courses added yet!</p>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>


                {{-- Data input modal area --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">

                        <form action="{{ route('course.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><span class="fa fa-file-text-o"></span> Add Course</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Course Title <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" name="title" placeholder="Course Title"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Course code <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" name="code" placeholder="Course code"
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Credit Load</label>
                                        <input type="text" class="form-control" name="creditload"
                                            placeholder="Credit Load">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Semester</label>
                                        <select name="semester_id" class="form-control">
                                            <option selected="disabled">Select Semester</option>
                                            @foreach ($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Acad. Seesion</label>
                                        <input type="text" class="form-control" id="datepickeryear" name="acadsession"
                                            placeholder="Academic Session">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <select name="department_id" class="form-control">
                                            <option selected="disabled">Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Taught By</label>
                                        <select name="user_id" class="form-control">
                                            <option selected="disabled">Select Lecturer</option>
                                            @foreach ($lecturers as $lecturer)
                                            <option value="{{$lecturer->id}}">{{$lecturer->lastname.', '.$lecturer->firstname}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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