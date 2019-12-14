@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default-assign">
            <span class="fa fa-exchange"></span> Schedule Exam
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Exam Day</th>
                                    <th>Course</th>
                                    <th>Invigilator</th>
                                    <th>Room</th>
                                    <th>Exam time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->examday->name}}</td>
                                    <td>{{$schedule->course->code}}</td>
                                    <td>{{$schedule->user->lastname.' '.$schedule->user->firstname}}</td>
                                    <td>{{$schedule->room->block->name.' - '.$schedule->room->rmnumber}}</td>
                                    <td>{{$schedule->examtime}}</td>


                                    <td><a href="{{ route('schedule.edit',$schedule->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$schedule->id}}" style="display: none"
                                            action="{{ route('schedule.destroy',$schedule->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$schedule->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Exam Day</th>
                                    <th>Course</th>
                                    <th>Invigilator</th>
                                    <th>Room</th>
                                    <th>Exam time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area for project allocation --}}
        <div class="modal fade" id="modal-default-assign">
            <div class="modal-dialog">

            <form action="{{route('schedule.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-exchange"></span> Schedule Exam</h4>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                                <label for="">Room <b style="color: red;">*</b></label>
                                <select class="form-control" name="room_id">
                                    <option selected="disabled">Select Room</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{$room->id}}">
                                        {{$room->block->name.' - '.$room->rmnumber}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Invigilator <b style="color: red;">*</b> </label>
                                <select class="form-control"
                                    data-placeholder="Select Invigilator" style="width: 100%;" name="user_id">
                                    <option selected="disabled">Select Invigilator</option>
                                    @foreach ($invigilators as $user)
                                    <option value="{{$user->id}}">
                                        {{$user->lastname.' '.$user->firstname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Exam Day <b style="color: red;">*</b> </label>
                                <select class="form-control"
                                    data-placeholder="Select Exam Day" style="width: 100%;" name="examday_id">
                                    <option selected="disabled">Select Exam Day</option>
                                    @foreach ($examdays as $examday)
                                    <option value="{{$examday->id}}">
                                        {{$examday->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Course <b style="color: red;">*</b> </label>
                                <select class="form-control"
                                    data-placeholder="Select Course" style="width: 100%;" name="course_id">
                                    <option selected="disabled">Select Course</option>
                                    @foreach ($courses as $course)
                                    <option value="{{$course->id}}">
                                        {{$course->title.' - '.$course->code}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Exam Time</label>
                                <select name="examtime" class="form-control">
                                    <option selected="disabled">Select Exam Time</option>
                                   
                                    <option>Morning - [9 - 12]</option>
                                    <option>Afternoon - [2 - 5]</option>
                                  
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