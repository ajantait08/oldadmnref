<!DOCTYPE html>
<style>
  .chart {
    width: 100%;
    min-height: 450px;
  }
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Application Status', 'Users Count'],
      <?php
      foreach ($appl_status as $row) {
        echo "['" . $row->Application_Status . "'," . $row->Count_students . "],";
      }
      ?>
    ]);

    var options = {
      legend: {
        position: 'bottom'
      },
      title: 'Total Applicants: ' + parseInt('<?php echo $appl_count[0]->Count_students; ?>'),
      colors: ['#3366cc', '#ff9900', '#109618', '#dc3912']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }

  $(window).resize(function() {
    drawChart();
  });
</script>
<div>
  <?php
  $this->load->view('admission/admin/layout/flashmessages');
  ?>
</div>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-home"></i>
    </span> Dashboard
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Application Status Wise Applicant Count</h4>
        <div id="piechart" class="chart"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>