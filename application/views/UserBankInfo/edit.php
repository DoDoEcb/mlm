<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "UserBankInfo"; ?>

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
 
<form action="<?php echo base_url($modelname."/edithit")?>" method="post" id="<?php echo "frm$modelname" ?>" enctype="multipart/form-data">

	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title"><?php echo $modelname ?> </h3>
					</div>
				 
					<div role="form">  
						<div class="box-body">
						    <div class="form-group"> 
								 <?php echo form_hidden('Id',$UserBankInfo->Id); ?>
							</div>
							<div class="form-group">
                                <?php echo form_label('Account Holder Name', 'AccountHolderName'); ?>
                                <?php echo form_input('AccountHolderName',$UserBankInfo->AccountHolderName); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('User', 'UserId'); ?> 
                                 <?php echo Ajaxdropdown('UserId',$this->omodel->ddlUser(),$UserBankInfo->UserId); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Bank Name', 'BankName'); ?>
                                <?php echo form_input('BankName',$UserBankInfo->BankName); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Account Number', 'AccountNumber'); ?>
                                <?php echo form_input('AccountNumber',$UserBankInfo->AccountNumber); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Branch', 'Branch'); ?>
                                <?php echo form_input('Branch',$UserBankInfo->Branch); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('I F C I_ Code', 'IFCI_Code'); ?>
                                <?php echo form_input('IFCI_Code',$UserBankInfo->IFCI_Code); ?>
                            </div>
							<div class="form-group">
                                  <?php echo form_label('Is Active', 'IsActive'); ?>
                                  <?php echo form_checkbox('IsActive' ,true ,$UserBankInfo->IsActive); ?> 
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
