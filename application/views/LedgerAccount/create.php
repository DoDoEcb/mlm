<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "LedgerAccount"; ?>

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
                                <?php echo form_label('Title', 'Title'); ?>
                                <?php echo form_input('Title'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Ledger Account Type', 'LedgerAccountTypeId'); ?>
                                 
                                 <?php echo Ajaxdropdown('LedgerAccountTypeId',$this->omodel->ddlLedgerAccountType()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Currency', 'Currency'); ?>
                                <?php echo form_input('Currency'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Account Code', 'AccountCode'); ?>
                                <?php echo form_input('AccountCode'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Account Color', 'AccountColor'); ?>
                                <?php echo form_input('AccountColor'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Parent', 'ParentId'); ?>
                                 
                                 <?php echo Ajaxdropdown('ParentId',$this->omodel->ddlLedgerAccount()); ?>
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
