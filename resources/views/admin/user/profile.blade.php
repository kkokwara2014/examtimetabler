@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                    Back</a>
                    <br>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 250px; height: 200px; border-radius: 50%;">
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <br>
                                    
                                    <input type="file" name="userimage">
                                    <p></p>
                                    <button type="submit" class="btn btn-success text-center"><span
                                            class="fa fa-upload"></span>
                                        Update Profile</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h3>{{strtoupper($user->lastname).', '.$user->firstname}}</h3>
                                </div>
                                <div>Identity Number: {{$user->regnumber}}</div>
                                <div>Email: {{$user->email}}</div>
                                <div>Phone: {{$user->phone}}</div>
                                <div>Department: {{$user->department->name.' - '.$user->department->code}}</div>
                                <div>Created: {{$user->created_at->diffForHumans()}}</div>
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