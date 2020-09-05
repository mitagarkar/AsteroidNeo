@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Neo Stats Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Neo Stats Search</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header" style='text-align: center;'>
                <h3 class="card-title">Neo Stats Search :</h3>
              </div>
              <!-- /.card-header -->
			  
			 <?php if(Session::has('alert-error')){ ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert" style='margin-top: 1%;'>
				  <strong>Error...! </strong> <?php echo session('alert-error'); ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php } ?>
             
              <!-- form start -->
              <form action="{{ url('/Home/NeoStatsResult') }}" method="POST" class="form-inline" style="padding-top: 5%;padding-bottom: 20%;padding-left: 24%;">
                @csrf
                <div class="form-group mb-2">
                  <label for="StartDate" class="sr-only">Start Date</label>
                  <input type="text" class="form-control" value="{{old('StartDate')}}" name="StartDate" id="StartDate" placeholder="Start Date"><br>
                  <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('StartDate', '<p class="help-block" style="color:red;">:message</p>') !!}
                  </small>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="EndDate" class="sr-only">End Date</label>
                  <input type="text" class="form-control" id="EndDate" value="{{old('EndDate')}}" name="EndDate" placeholder="End Date"><br>
                   <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('EndDate', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </small>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
              </form>
         
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->










@include('admin.include.footer')

<script>
  $(document).ready(function() {

    $('#StartDate').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight:'TRUE',
      autoclose: true,
    });

    $('#EndDate').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight:'TRUE',
      autoclose: true,
    });

  });


</script>

@endsection