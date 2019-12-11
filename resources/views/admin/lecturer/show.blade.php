@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lecturer Details
            <small>Lecturer Information</small>
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
                <div>
                    <a href="{{ route('lecturer.index') }}" class="btn btn-primary btn-sm">
                        Back</a>
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
                                width: 50%;" src="{{url('user_images',$lecturer->userimage)}}" alt=""
                                            class="img-responsive img-circle" width="180" height="180">

                                        <p>
                                            <h3>{{$lecturer->lastname.' '.$lecturer->firstname}}</h3>
                                        </p>
                                        <hr>
                                        <div>Staff Number : {{$lecturer->regnumber}} </div>
                                        {{-- <div>Gender : {{$lecturer->gender}}
                                    </div> --}}
                                    <div>Email : {{$lecturer->email}} </div>
                                    <div>Phone : {{$lecturer->phone}}</div>
                                    <div>Department : {{$lecturer->department->name.' - '.$lecturer->department->code}}
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
                                    <h3>Courses Taught</h3>
                                    <ul class="list-group">
                                        @forelse ($lecturercourses as $lectcourse)
                                        <li class="list-group-item">

                                            {{$lectcourse['title'].' - '.$lectcourse['code']}}

                                        </li>
                                        @empty
                                        <p style="background-color: crimson;" class="badge badge-info"><strong>No
                                                Course assigned yet!</strong></p>
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