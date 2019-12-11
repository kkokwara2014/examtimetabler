@include('admin.layout.statboardcontainer')
<!-- Small boxes (Stat box) -->
<section class="content">
  <div class="row">
    @if (Auth::user()->role->id==1||Auth::user()->role->id==2)
    <div class="row">
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
          <h3>0</h3>
  
            <p>Allocated Projects</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
          <div class="inner">
          <h3>9</h3>
  
            <p>Unallocated Projects</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>2</h3>
  
            <p>Students</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>2</h3>
  
            <p>Lecturers</p>
          </div>
          <div class="icon">
            <i class="fa fa-graduation-cap"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-light-blue-active">
          <div class="inner">
            <h3>6</h3>
  
            <p>Project Coordinator</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon-active">
          <div class="inner">
            <h3>1</h3>
  
            <p>Admins</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    @endif
  </div>
</section>
<!-- /.row -->