<?php $this->view('_Layout/header'); ?>


<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<section class="content-header">
    <h1>
        Dashboard
        <small>   </small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>  <?php echo $User ?> </h3>
                    <p>Total Users Count</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <a class="small-box-footer" href="<?php base_url("User") ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>  <?php echo $Role ?> </h3>
                    <p>Total Roles</p>
                </div>
                <div class="icon">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <a class="small-box-footer" href="<?php base_url("Role") ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3> <?php echo $Menu ?> </h3>
                    <p>Total Menus</p>
                </div>
                <div class="icon">
                    <i class="fa fa-caret-square-o-right"></i>
                </div>
                <a class="small-box-footer" href="<?php base_url("Menu") ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        
       
         
    </div><!-- /.row -->


 

    <div class="row">
        

        <div class="col-md-5">
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User And Role</h3>
                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="bindPieChart"></div>
                </div>
            </div>
        </div>
       

        <div class="col-md-7">
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Details</h3>
                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <button class="btn btn-primary btn-xs" id="plain">Plain</button>
                    <button class="btn btn-info btn-xs" id="inverted">Inverted</button>
                    <button class="btn btn-success btn-xs" id="polar">Polar</button>
                    <div class="chart" id="otherInfo"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row"> 
        <div class="col-md-8">
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">This week Register</h3>
                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Chart</h3>
                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="work-chart"></div>
                </div>
            </div>
        </div>

        


    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"> Gender </span>
                    <span class="info-box-number"> <?php //echo $Gender ?></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-lock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"> InActive User</span>
                    <span class="info-box-number"><?php //echo $InActiveUser ?>  </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">  Active User</span>
                    <span class="info-box-number"><?php //echo $ActiveUser ?> </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"> Last Week Register   </span>
                    <span class="info-box-number"> <?php //echo $LastweekRegister   ?>   </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->


</section>

<script type="text/javascript">
    $(function () {
        "use strict";

        //DONUT CHART
        var donut = new Morris.Donut({
            element: 'work-chart',
            resize: true,
            colors: ["#00a65a", "#00e765", "#3c8dbc"],
            data: [
                {
                    label: "Total User", value: "<?php echo $User ?>"
                },
                {
                    label: "Total Role", value: "<?php echo $Role ?>"
                },
                {
                    label: "Total Menu", value: "<?php echo $Menu ?>"
                }
            ],
            hideHover: 'auto'
        });



        BindLastRegister(7); 


    });
	
	 /*function BindLastRegister(days) {
        $.ajax({
            url: "<?=base_url("home/GetLastWeekRegister") ?>",
            type: "Post",
            data: { 'lastDay': days },
            dataType: 'json',//json
            success: function (datar) {
                Morris.Line({
                    element: 'line-chart',
                    resize: true,
                    data: datar,
                    xkey: 'label',
                    ykeys: ['value'],
                    labels: ['Count'],
                    lineColors: ['#00a65a'],
                    hideHover: 'auto'
                });
            }
        });
    }*/


    var chart = Highcharts.chart('otherInfo', {

        title: {
            text: 'Other Information'
        },

        xAxis: {
            categories: ['User', 'Role', 'Menu']
        },

        series: [{
            name: 'Total Count',
            type: 'column',
            colorByPoint: true,
            data: [<?php echo $User ?>,<?php echo $Role ?>,<?php echo $Menu ?>],
            showInLegend: false
        }], chart: {
            inverted: true,
            polar: false
        }

    });


    $('#plain').click(function () {
        chart.update({
            chart: { inverted: false, polar: false },
            subtitle: { text: 'Plain' }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: { inverted: true, polar: false },
            subtitle: { text: 'Inverted' }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: { inverted: false, polar: true },
            subtitle: { text: 'Polar' }
        });
    });



    Highcharts.chart('bindPieChart', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 33
            }
        },
        title: {
            text: 'Role & User'
        },
        //subtitle: {
        //    text: 'g'
        //},
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Total Count',
            data: [
                ['User', <?php echo $User ?>],
                ['Role', <?php echo $Role ?>],
            ]
        }]
    });
     
    

</script>


<?php $this->view('_Layout/footer'); ?>