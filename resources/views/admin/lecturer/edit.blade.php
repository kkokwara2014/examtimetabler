@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('supervisor.index') }}" class="btn btn-success">
           <span class="fa fa-eye"></span> All Supervisors
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-5">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('supervisor.update',$supervisors->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$supervisors->name}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('supervisor.index') }}" class="btn btn-default">Cancel</a>

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