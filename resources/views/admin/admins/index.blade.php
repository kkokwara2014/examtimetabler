@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Admin
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">



                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)


                                <tr>

                                    <td>{{$admin->lastname}}</td>
                                    <td>{{$admin->firstname}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td><a href="{{ route('admin.show',$admin->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    <td>
                                        @if ($admin->isactive==1)
                                        <span class="fa fa-check-circle fa-2x text-success"></span>
                                        @else
                                        <span class="fa fa-close fa-2x text-danger"></span>
                                        @endif

                                    </td>

                                    <td>
                                        @if ($admin->isactive==1)

                                        <form id="delete-form-{{$admin->id}}" style="display: none"
                                            action="{{ route('admin.deactivate',$admin->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Deactivate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$admin->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-danger btn-sm btn-block">Deactivate
                                        </a>
                                        @else

                                        <form id="delete-form-{{$admin->id}}" style="display: none"
                                            action="{{ route('admin.activate',$admin->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Activate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$admin->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-success btn-sm btn-block"> Activate
                                        </a>

                                        @endif
                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
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

                <form action="{{ route('admin.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-user-plus"></span> Add Admin</h4>
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
                                <input id="othername" type="text" class="form-control" name="othername"
                                    value="{{ old('othername') }}" placeholder="Othername(s)">

                            </div>
                            <div class="form-group">
                                <input id="identitynumber" type="text"
                                    class="form-control{{ $errors->has('identitynumber') ? ' is-invalid' : '' }}"
                                    name="identitynumber" value="{{ old('identitynumber') }}" required autofocus
                                    placeholder="Staff Number e.g SS-755" maxlength="8">

                                @if ($errors->has('identitynumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identitynumber') }}</strong>
                                </span>
                                @endif

                            </div>


                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="phone" type="tel"
                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                    value="{{ old('phone') }}" required placeholder="Phone" maxlength="11">

                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option selected="disabled">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select class="form-control @error('department_id') is-invalid @enderror"
                                    name="department_id" value="{{ old('department_id') }}" id="department_id">

                                    <option selected="disabled">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name.' - '.$department->code}}
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

                            <input type="hidden" name="role_id" value="1">
                            <input type="hidden" name="isactive" value="1">

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