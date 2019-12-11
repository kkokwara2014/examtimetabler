@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lecturers
            <small>All Lecturers</small>
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

                {{-- @if (Auth::user()->role->id==1||Auth::user()->role->id==2) --}}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <span class="fa fa-plus"></span> Add Lecturer
                </button>
                {{-- @endif --}}
                <br>

                <div class="row">
                    <div class="col-md-12">

                        {{-- for messages --}}
                        {{-- @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                        @endif --}}

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Identity Number</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>View Details</th>

                                            <th>Edit</th>

                                            @if (Auth::user()->role->id==1)

                                            <th>Delete</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lecturers as $lecturer)
                                        {{-- @if((Auth::user()->id==$lecturer->id||Auth::user()->role->id==2||Auth::user()->role->id==1)) --}}

                                        <tr>

                                            <td>{{$lecturer->lastname}}</td>
                                            <td>{{$lecturer->firstname}}</td>
                                            <td>{{$lecturer->regnumber}}</td>

                                            <td>{{$lecturer->email}}</td>
                                            <td>{{$lecturer->phone}}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('lecturer.show',$lecturer->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td>

                                            <td style="text-align: center">


                                                <a href="{{ route('lecturer.edit',$lecturer->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span></a>

                                            </td>

                                            @if (Auth::user()->role->id==1)

                                            <td style="text-align: center">
                                                <form id="delete-form-{{$lecturer->id}}" style="display: none"
                                                    action="{{ route('lecturer.destroy',$lecturer->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a href="" onclick="
                    if (confirm('Are you sure you want to delete this?')) {
                        event.preventDefault();
                    document.getElementById('delete-form-{{$lecturer->id}}').submit();
                    } else {
                        event.preventDefault();
                    }
                "><span class="fa fa-trash fa-2x text-danger"></span>
                                                </a>

                                            </td>
                                            {{-- @endif --}}


                                        </tr>

                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Identity Number</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>View Details</th>
                                            <th>Edit</th>

                                            @if (Auth::user()->role->id==1)

                                            <th>Delete</th>
                                            @endif

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>


                {{-- Data input modal area --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">

                        <form action="{{ route('lecturer.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><span class="fa fa-graduation-cap"></span> Add Lecturer
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input id="lastname" type="text"
                                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            name="lastname" value="{{ old('lastname') }}" required autofocus
                                            placeholder="Last Name">

                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="firstname" type="text"
                                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                            name="firstname" value="{{ old('firstname') }}" required autofocus
                                            placeholder="First Name">

                                        @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="othername" type="text"
                                            class="form-control{{ $errors->has('othername') ? ' is-invalid' : '' }}"
                                            name="othername" value="{{ old('othername') }}" required autofocus
                                            placeholder="Othername(s)">

                                        @if ($errors->has('othername'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('othername') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <input id="regnumber" type="text"
                                            class="form-control{{ $errors->has('regnumber') ? ' is-invalid' : '' }}"
                                            name="regnumber" value="{{ old('regnumber') }}" required autofocus
                                            placeholder="Staff Number e.g SS-7899" maxlength="8">

                                        @if ($errors->has('regnumber'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('regnumber') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <select class="form-control @error('department_id') is-invalid @enderror"
                                            name="department_id" value="{{ old('department_id') }}" id="department_id">

                                            <option selected="disabled">Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">
                                                {{$department->name.' - '.$department->code}}
                                            </option>
                                            @endforeach

                                        </select>

                                        @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                        @endif

                                    </div>



                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required autofocus
                                            placeholder="Email">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="phone" type="tel"
                                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ old('phone') }}" required placeholder="Phone"
                                            maxlength="11">

                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="Password">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required placeholder="Repeat Password">
                                    </div>

                                    <input type="hidden" name="role_id" value="2">
                                    {{-- <input type="hidden" name="isactive" value="1"> --}}

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