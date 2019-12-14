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
                                        <label for="name">Class Level</label>
                                        <select name="classlevel_id" class="form-control">
                                            <option selected="disabled">Select Class Level</option>
                                            @foreach ($classlevels as $classlevel)

                                            <option value="{{$classlevel->id}}"
                                                {{$classlevel->id==$courses->classlevel_id ? 'selected':''}}>
                                                {{$classlevel->name}}</option>

                                            @endforeach
                                        </select>
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