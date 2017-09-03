<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "Transaction"; ?>

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
								 <?php echo form_hidden('DateAdded', date('y/m/d h:m:s') )  ?>
							</div>
							<div class="form-group"> 
								 <?php echo form_hidden('AddedBy', $this->session->userdata('uid')); ?>
							</div>
							<div class="form-group">
                                 <?php echo form_label('Debit Ledger Account', 'DebitLedgerAccountId'); ?>
                                 
                                 <?php echo Ajaxdropdown('DebitLedgerAccountId',$this->omodel->ddlLedgerAccount()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Debit Amount', 'DebitAmount'); ?>
                                <?php echo form_input('DebitAmount'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Credit Ledger Account', 'CreditLedgerAccountId'); ?>
                                 
                                 <?php echo Ajaxdropdown('CreditLedgerAccountId',$this->omodel->ddlLedgerAccount()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Credit Amount', 'CreditAmount'); ?>
                                <?php echo form_input('CreditAmount'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Transaction Date', 'TransactionDate'); ?> 
                                 <?php
									$taTransactionDate = array (
											'name' => 'TransactionDate',
											'id' => 'TransactionDate',
											'value' =>'',
											'width' => '200' 
									);
									?>
                                  <?php echo form_input($taTransactionDate); ?>
                                 <script> $(function () { $('#TransactionDate').datepicker({dateFormat: 'yy-mm-dd'}); }); </script>
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
