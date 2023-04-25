@extends('layout.apptheme')
@section('hr-HRM')

<style>

    #loader{
        display:none;
        position: fixed;
        height: 100%;
        width: 100%;
        top: 10px;
        bottom: 80px;
        left: 80px;
        background:url("https://mobilelinkusa.com/callingtree/public/images/loader1.gif");
        background-size: 10%;
        z-index: 1;
        background-color: #ffffff5c;
        background-repeat: no-repeat;
        background-position: 60% 80%;
    }

    .highcharts-figure, .highcharts-data-table table {
        min-width: 310px; 
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
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
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
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
					<h3 class="page-title">Department Leaves Chart</h3>
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

        <!-- /Page Header -->
        <div class="row" id="modals">
            <div class="col-sm-12 col-md-12">
                <form id="frmeditstore"  >
                    <div class="row filter-row" style="display: flex!important;">
                        <div class="col-sm-3 col-md-3">
                        </div>
                        <div class="col-sm-3 col-md-3">  
                            <label class="focus-label">Select Month</label>
                            <br>
                            <select class="selectpicker show-tick" name="mydata" id="searchdrop">
                                <option value="" selected="" disabled="">Select</option>
                                <option value="01">January</option>
                                <option value="02">Feburary</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>                        
                        <div id="field" class="col-sm-4 col-md-4">
                        </div>
                        <div class="col-sm-2 col-md-2">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br/>
		<div class="text-right form-inline">

		</div>
                    <div id="loader"></div> 
		<!-- Page Header -->
		<figure class="highcharts-figure">
            <div id="container"></div>
            <!-- <p class="highcharts-description">
                Chart showing browser market shares. Clicking on individual columns
                brings up more detailed data. This chart makes use of the drilldown
                feature in Highcharts to easily switch between datasets.
            </p> -->
        </figure>
	</div>
</div>
<!-- Page Wrapper -->

<script>
    $('document').ready(function(){
        $('#searchdrop').on('change',function(){
                var dropdown = $(this).attr('name');
                var dropdownval = $(this).val();
                
                if(dropdownval){
                    $("#field").html("<div class='row filter-row'><div class='col-sm-5 col-md-5' style='margin-top: 5%;'><input class='btn btn-success btn-block' type='submit'></div></div>");
                }else{
                    $("#field").html("<div><h2>Invalid Type</h2></div>");
                }
        });

        $('#modals').on('submit','#frmeditstore',function(e){
                    
            $("#loader").show();
            e.preventDefault();
            
            
            var $inputs = $('#frmeditstore :input');
            
            
            
            var values = {};
            $inputs.each(function() {
                values[this.name] = $(this).val();
            });
            
            
            dampa=values['mydata'];
            
            // console.log($(this).serialize());
            
            $.get('{{ URL::to("/depleavesearchmonthchart")}}/'+dampa,function(data){
                
                $('#container').empty().append(data);
                
                $("#loader").hide();
                
            })
        });
        
    });
</script>


<script>
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Department Wise Monthly Leaves Chart'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    // },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Number Of Leave Count'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> Leaves<br/>'
    },

    series: [
        {
            name: "Department",
            colorByPoint: true,
            data: [
              <?php
              foreach ($data['employeedepart'] as $val){
              ?>
              { 
			  name:"{{$val->dept_name}}",
				y:{{$data['empdata'][$val->dept_id]}}
				
			},

              <?php
              }
              ?>
            ]
        }
    ]
});
</script>
@endsection