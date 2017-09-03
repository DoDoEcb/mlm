<?php $this->view('_Layout/header');?>

<?php $this->view ('common/indexpage'); //common refference like js or css ?>

<?php
$modelname = "UserPersonalInfo";
?>


<section class="content-header">
	<h1>
        <?php echo $modelname ?> List
        <small> <?php echo $modelname ?> List</small>
	</h1>
</section>

<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid box-primary">

				<div class="box-body">
					<!-- Split button -->
					<div class="margin">

						<div class="btn-group"> 
						    <?php AjaxButton($modelname."/create/?ajax=1","Create Quick","btn btn-primary","createquick"); ?> 
						</div>
						<div class="btn-group">
							<a class="btn btn-default" href="<?php echo base_url($modelname."/create")?>">Create</a>
						</div>
					</div>
					<!-- flat split buttons -->
				</div>
				<!-- /.box-body -->
			</div>
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo $modelname ?></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive">

					<div class="margin">

						<div class="streaming-table">
							<span id="found" class="label label-info"></span>
							<table id="tb<?php echo "$modelname" ?>" class="display nowrap">
								<thead>
									<tr>
										<th>Actions</th>
										<th>S.No</th>
										
										<th>First Name</th>
										<th>Last Name</th>
										<th>Gender</th>
										<th>About</th>
										<th>Profile Image</th>
										<th>Date Join</th>
										<th>User</th>
										<th>Middle Name</th>
										<th>Email</th>
										<th>Father And Spouse Name</th>
										<th>D O B</th>
										<th>Mother Name</th>
										<th>Nomine Name</th>
										<th>City</th>
										<th>Zip Code</th>
										<th>Pan Number</th>
										<th>Education Detail</th>
										<th>Last Employee Firm</th>
										<th>Last Employee Year</th>
										<th>Last Employee Anual Income</th>
										<th>Is Active</th>

									</tr>
								</thead>
								<tbody></tbody>
							</table>

							<div id="summary">
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<script>
    $(document).ready(function () {

        $('#tb<?php echo "$modelname" ?>').dataTable({
            "bRetrieve": true,
            "bProcessing": true,
            "dom": 'lBfrtip',
            "sAjaxSource": "<?php echo base_url($modelname."/Display")?>",
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            "pageLength": 10,
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            "aoColumns": [
                {
                    "mRender": function (oObj, type, row)
                    { 
                        var buttons = '<div class="text-center"> <div class="btn-group text-left"> <button type="button" class="btn btn-default btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>';
                        	buttons += '<ul class="dropdown-menu pull-left" role="menu">';
                        	buttons += '<li><a href="<?php echo base_url($modelname."/edit")?>/'+row[0]+'"><i class="fa fa-edit"></i>Full Edit</a></li>';
                        	buttons += '<li class="divider"></li>';
                        	buttons += '<li><a href="<?php echo base_url($modelname."/edit")?>/'+row[0]+'?ajax=1" data-ajax-update="#SkEdit" data-ajax-success="openModalDialog(\'SkEdit\', \'Edit\')" data-ajax-mode="replace" data-ajax-method="GET" data-ajax-failure="clearModalDialog(\'SkEdit\');alert(\'Ajax call failed\')" data-ajax-begin="prepareModalDialog(\'SkEdit\')" data-ajax="true"><i class="fa fa-pencil-square"></i>Quick Edit</a></li>';
                            buttons +='<li><a onclick="deleterow(' + row[0] +')"><i class="fa fa-trash-o"></i> Delete</a></li>';
                        	buttons +='</ul>';
                        	buttons +='</div></div>';
                    	return buttons;
                    }
                },
                
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{},
				{}
            ]
        });

    });

    function deleterow(id)
    {
        var response = confirm("are you sure you want to delete?");
        if (response == true)
        {
            $.ajax({
                url: "<?php echo base_url($modelname."/deletehit")?>/" + id,
                type: "get",
                dataType: 'json', //json
                success: function (data) { 
                    if (data.status==true) { 
                        var table = $('#<?php echo "tb$modelname" ?>').DataTable();
                        table.ajax.reload();
                    }
                }
            });
        }

    }

</script>
<?php $this->view('_Layout/footer');?>
