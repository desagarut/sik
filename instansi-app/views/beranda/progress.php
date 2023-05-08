<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-4">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">PROGRAM</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="chart-responsive">
            <canvas id="pieChart" height="150"></canvas>
          </div>
          <!-- ./chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <ul class="chart-legend clearfix">
            <li><i class="far fa-circle text-danger"></i> PSDA</li>
            <li><i class="far fa-circle text-success"></i> INFRASWIL</li>
            <li><i class="far fa-circle text-warning"></i> PPM</li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer p-0">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a href="#" class="nav-link">
            PPSDA
            <span class="float-right text-danger">
              <i class="fas fa-arrow-down text-sm"></i>
              12%</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            INFRASWIL
            <span class="float-right text-success">
              <i class="fas fa-arrow-up text-sm"></i> 4%
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            PPM
            <span class="float-right text-warning">
              <i class="fas fa-arrow-left text-sm"></i> 0%
            </span>
          </a>
        </li>
      </ul>
    </div>
    <!-- /.footer -->
  </div>
</div>

<script>
  $(function () {
  'use strict'
  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: [
      'PSDA',
      'Infraswil',
      'PPM',
    ],
    datasets: [
      {
        data: [700, 500, 400],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  //-----------------
  // - END PIE CHART -
  //-----------------
})
</script>