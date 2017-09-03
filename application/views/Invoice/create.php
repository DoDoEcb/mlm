<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "Invoice"; ?>

<section class="content-header">
	<h1>
        <?php echo $modelname ?>
        <small><?php echo $modelname ?></small>
	</h1>
</section>

<?php $this->view ('common/editorpage'); //common refference like js or css ?>

<?php   
AjaxSubmit($modelname,$IsAjaxRequest);
?>

  

<form action="<?php echo base_url($modelname."/createhit")?>" method="post" id="<?php echo "frm$modelname" ?>" enctype="multipart/form-data">

	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title"><?php echo $modelname ?> </h3>
					</div>
					<!-- form start -->
					<div role="form">
						<div class="box-body">
							<div class="form-group">
                                 <?php echo form_label('Bill Date', 'BillDate'); ?> 
                                 <?php
									$taBillDate = array (
											'name' => 'BillDate',
											'id' => 'BillDate',
											'value' =>'',
											'width' => '200' 
									);
									?>
                                  <?php echo form_input($taBillDate); ?>
                                 <script> $(function () { $('#BillDate').datepicker({dateFormat: 'yy-mm-dd'}); }); </script>
							</div>
							<div class="form-group">
                                 <?php echo form_label('Due Date', 'DueDate'); ?> 
                                 <?php
									$taDueDate = array (
											'name' => 'DueDate',
											'id' => 'DueDate',
											'value' =>'',
											'width' => '200' 
									);
									?>
                                  <?php echo form_input($taDueDate); ?>
                                 <script> $(function () { $('#DueDate').datepicker({dateFormat: 'yy-mm-dd'}); }); </script>
							</div>
							<div class="form-group">
                                 <?php echo form_label('Payment Status', 'PaymentStatusId'); ?>
                                 
                                 <?php echo Ajaxdropdown('PaymentStatusId',$this->omodel->ddlPaymentStatus()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Last Emailed', 'LastEmailed'); ?>
                                <?php echo form_input('LastEmailed'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Other Invoice Code', 'OtherInvoiceCode'); ?>
                                <?php echo form_input('OtherInvoiceCode'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Client', 'ClientId'); ?>
                                <?php echo form_input('ClientId'); ?>
                            </div>
							<div class="form-group"> 
								 <?php echo form_hidden('CreatedBy', $this->session->userdata('uid')); ?>
							</div>

						</div>
						<div class="box-footer">
							<input type='submit' name='submit' class="btn btn-success" value='Submit' /> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</form>

<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/footer' );
}
?>
