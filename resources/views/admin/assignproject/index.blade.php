@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-8 connectedSortable">
        
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Supervisor</th>
                                    <th>Assigned Projects</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supervisors as $supervisor)
                                <tr>
                                    <td>{{$supervisor->title.' '.$supervisor->lastname.' '.$supervisor->firstname}}</td>
                                    <td>
                                        <a href="{{ route('allocation.show',$supervisor->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Supervisor</th>
                                    <th>Assigned Projects</th>
                                </tr>
                            </tfoot>
                        </table>
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