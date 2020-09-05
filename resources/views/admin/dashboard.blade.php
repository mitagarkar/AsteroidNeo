@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')

<style>
.AnchorTag{
    color: inherit;
}

</style>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
	        <!-- Info boxes -->
	        <div class="row">
	          <div class="col-12 col-sm-6 col-md-3">
	          	<a href="{{ url('/Home/NeoStats') }}" class="AnchorTag">
		            <div class="info-box">
		              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-search"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Neo Stats Search</span>
		                <span class="info-box-number">
		                  10
		                  <small>%</small>
		                </span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
	            </a>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	         

	          <!-- fix for small devices only -->
	          <div class="clearfix hidden-md-up"></div>

	         
	        </div>
	        <!-- /.row -->
	    </div>
	</section>










@include('admin.include.footer')


@endsection