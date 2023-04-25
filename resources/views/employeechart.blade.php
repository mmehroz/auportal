@extends('layout.apptheme')
@section('hr-HRM')

<style>
#container {
  height: 400px; 
}

.highcharts-credits{
  fill: #ffffff!important;
  cursor: none!important;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Employee Leaves Chart</h3>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/mainDashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Leaves Count</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="text-right form-inline">

		</div>
		<!-- Page Header -->
		<figure class="highcharts-figure">
            <div id="container"></div>
            <!-- <p class="highcharts-description">
                A variation of a 3D pie chart with an inner radius added.
                These charts are often referred to as donut charts.
            </p> -->
        </figure>
	</div>
</div>
<!-- Page Wrapper -->

<script>
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Current Month Employee Leaves Chart'
    },
    subtitle: {
        text: 'Pending & Approved leaves Count'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Total Leaves',
        data: [
     <?php
foreach ($data['employeename'] as $val){
?>
['{{$val->elsemployees_name}}', {{$data['maintask'][$val->elsemployees_empid]}}],

<?php
}
?>
        ]
    }]
});
</script>
@endsection