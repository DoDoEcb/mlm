<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "Product"; ?>

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
                                <?php echo form_label('Name', 'Name'); ?>
                                <?php echo form_input('Name'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Purchase Cost', 'PurchaseCost'); ?>
                                <?php echo form_input('PurchaseCost'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Sale Price', 'SalePrice'); ?>
                                <?php echo form_input('SalePrice'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Product Category', 'ProductCategoryId'); ?>
                                 
                                 <?php echo Ajaxdropdown('ProductCategoryId',$this->omodel->ddlProductCategory()); ?>
                            </div>
							<div class="form-group">
                                  <?php echo form_label('Is Active', 'IsActive'); ?>
                                  <?php echo form_checkbox('IsActive',true); ?> 
                            </div>
							<div class="form-group">
                                <?php echo form_label('Product Image', 'ProductImage'); ?>
                                <?php echo form_upload('ProductImage'); ?> 
                            </div>
							<div class="form-group">
                                <?php echo form_label('Bare Code', 'BareCode'); ?>
                                <?php echo form_input('BareCode'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Description', 'Description'); ?>
                                 <?php
									$taDescription = array (
											'name' => 'Description',
											'id' => 'Description',
											'value' => '',
											'rows' => '2',
											'class' => 'ckeditor' 
									);
									?>
                                 <?php echo form_textarea($taDescription); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Re Order Value', 'ReOrderValue'); ?>
                                <?php echo form_input('ReOrderValue'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Stock', 'Stock'); ?>
                                <?php echo form_input('Stock'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Min Stock Value', 'MinStockValue'); ?>
                                <?php echo form_input('MinStockValue'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Manufacturer', 'Manufacturer'); ?>
                                <?php echo form_input('Manufacturer'); ?>
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
