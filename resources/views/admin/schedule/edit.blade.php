@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('itcompany.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All IT Companies
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('itcompany.update',$itcompanies->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="">Name <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="name" value="{{$itcompanies->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Address <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="address"
                                    value="{{$itcompanies->address}}">
                            </div>
                            <div class="form-group">
                                <label for="">Phone <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="phone" value="{{$itcompanies->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Location</label>
                                <select name="location_id" class="form-control">
                                    <option selected="disabled">Select Location</option>
                                    @foreach ($locations as $location)

                                    <option value="{{$location->id}}"
                                        {{$location->id==$itcompanies->location_id ? 'selected':''}}>
                                        {{$location->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}}
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('itcompany.index') }}" class="btn btn-default">Cancel</a>

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