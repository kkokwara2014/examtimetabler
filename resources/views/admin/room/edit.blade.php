@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('room.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Rooms
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('room.update',$rooms->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="">Room # <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="rmnumber" 
                                    value="{{$rooms->rmnumber}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Block</label>
                                <select name="block_id" class="form-control">
                                    <option selected="disabled">Select block</option>
                                    @foreach ($blocks as $block)

                                    <option value="{{$block->id}}"
                                        {{$block->id==$rooms->block_id ? 'selected':''}}>
                                        {{$block->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('room.index') }}" class="btn btn-default">Cancel</a>

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