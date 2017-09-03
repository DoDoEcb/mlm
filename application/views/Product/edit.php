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
								 <?php echo form_hidden('Id',$Product->Id); ?>
							</div>
							<div class="form-group">
                                <?php echo form_label('Name', 'Name'); ?>
                                <?php echo form_input('Name',$Product->Name); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Purchase Cost', 'PurchaseCost'); ?>
                                <?php echo form_input('PurchaseCost',$Product->PurchaseCost); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Sale Price', 'SalePrice'); ?>
                                <?php echo form_input('SalePrice',$Product->SalePrice); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Product Category', 'ProductCategoryId'); ?> 
                                 <?php echo Ajaxdropdown('ProductCategoryId',$this->omodel->ddlProductCategory(),$Product->ProductCategoryId); ?>
                            </div>
							<div class="form-group">
                                  <?php echo form_label('Is Active', 'IsActive'); ?>
                                  <?php echo form_checkbox('IsActive' ,true ,$Product->IsActive); ?> 
                            </div>
							<div class="form-group">
                                <?php echo form_label('Product Image', 'ProductImage'); ?>
                                <?php echo form_upload('ProductImage'); ?> 
                                <?php echo form_hidden('ProductImage1',$Product->ProductImage); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Bare Code', 'BareCode'); ?>
                                <?php echo form_input('BareCode',$Product->BareCode); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Description', 'Description'); ?>
                                 <?php
									$taDescription = array (
											'name' => 'Description',
											'id' => 'Description',
											'value' => $Product->Description,
											'rows' => '2',
											'class' => 'ckeditor' 
									);
									?>
                                 <?php echo form_textarea($taDescription); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Re Order Value', 'ReOrderValue'); ?>
                                <?php echo form_input('ReOrderValue',$Product->ReOrderValue); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Stock', 'Stock'); ?>
                                <?php echo form_input('Stock',$Product->Stock); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Min Stock Value', 'MinStockValue'); ?>
                                <?php echo form_input('MinStockValue',$Product->MinStockValue); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Manufacturer', 'Manufacturer'); ?>
                                <?php echo form_input('Manufacturer',$Product->Manufacturer); ?>
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
