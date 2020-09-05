@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')
<style>
.card-title {
    float: none !important;
    font-size: 1.1rem !important;
    font-weight: 400 !important;
    margin: 0 !important;
}
.table td {
   text-align: center;   
}
.table th {
   text-align: center;   
}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Neo Stats Search Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Neo Stats Search Result</li>
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
                <h3 class="card-title">Neo Stats Search Result :</h3>
              </div>
              <!-- /.card-header -->
            
            <div class="row">
                <div class="col-sm-4" style='padding-top: 1%;'>
                 <div class="card">
                      <div class="card-header"  style='text-align:center'>
                        <h3 class="card-title">Fastest Asteroid in km/h </h3>
                      </div>
                  <!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>ID</th>
                              <th>SPEED</th>
                            
                            </tr>
                          </thead>
                          <tbody>
                           <?php $x = 1; foreach($speed_list as $data){ ?>
                            <tr>
                              <td><?php echo $x;?></td>
                              <td><?php echo $data['asteroid_id'];?></td>
                              <td><?php echo $data['speed'];?></td>
                              
                            </tr>
                            <?php $x++; } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                 </div>
                 <div class="col-sm-4" style='padding-top:1%;'>
                     <div class="card">
                      <div class="card-header" style='text-align:center'>
                        <h3 class="card-title">Closest Asteroid</h3>
                      </div>
                  <!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>ID</th>
                              <th>DISTANCE</th>
                            
                            </tr>
                          </thead>
                          <tbody>
                           <?php $x = 1; foreach($distance_list as $data){ ?>
                            <tr>
                              <td><?php echo $x;?></td>
                              <td><?php echo $data['asteroid_id'];?></td>
                              <td><?php echo $data['distance'];?></td>
                              
                            </tr>
                            <?php $x++; } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                 </div>
                 <div class="col-sm-4" style='padding-top:1%;'>
                     <div class="card">
                      <div class="card-header"  style='text-align:center'>
                        <h3 class="card-title">Average Size of the Asteroids</h3>
                      </div>
                  <!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>ID</th>
                              <th>SIZE</th>
                            
                            </tr>
                          </thead>
                          <tbody>
                           
                            <?php $x = 1; foreach($size_list as $data){ ?>
                                <tr>
                                  <td><?php echo $x;?></td>
                                  <td><?php echo $data['asteroid_id'];?></td>
                                  <td><?php echo $data['size'];?></td>

                                </tr>
                            <?php $x++; } ?>
                            
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                 </div>
             </div>
            </div>
            <!-- /.card -->
            
            <div class="card card-info">
              <div class="card-header" style='text-align:center'>
                <h3 class="card-title">Total Number of Asteroids</h3>
              </div>
              <div class="card-body" style='height: 900px;'>
                
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ["Element", "Density", { role: "style" } ],
                        <?php $x = 1; foreach($date_list as $data){ ?>
                           ["<?php echo $data['close_date'];?>", <?php echo $data['tebCount'];?>, "#b87333"],
						<?php $x++; } ?>
        
                            
                          ]);

                          var view = new google.visualization.DataView(data);
                          view.setColumns([0, 1,
                                           { calc: "stringify",
                                             sourceColumn: 1,
                                             type: "string",
                                             role: "annotation" },
                                           2]);

                          var options = {
                            title: "Total Number of Asteroids For Each Day ",
                            width: 1000,
                            height: 800,
                            bar: {groupWidth: "95%"},
                            legend: { position: "none" },
                          };
                          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                          chart.draw(view, options);
                      }
                      </script>
                    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>    
                
              </div>
              <!-- /.card-body -->
            </div>
            
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

  

  });


</script>

@endsection