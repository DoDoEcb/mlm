<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "User"; ?>

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
								 <?php echo form_hidden('Id',$User->Id); ?>
							</div>
							<div class="form-group">
                                <?php echo form_label('Username', 'Username'); ?>
                                <?php echo form_input('Username',$User->Username); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Password', 'Password'); ?>
                                <?php echo form_input('Password',$User->Password); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Parent', 'ParentId'); ?> 
                                 <?php echo Ajaxdropdown('ParentId',$this->omodel->ddlUser(),$User->ParentId); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Leg', 'LegId'); ?> 
                                 <?php echo Ajaxdropdown('LegId',$this->omodel->ddlLeg(),$User->LegId); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Member Ship Level', 'MemberShipLevelId'); ?> 
                                 <?php echo Ajaxdropdown('MemberShipLevelId',$this->omodel->ddlMemberShipLevel(),$User->MemberShipLevelId); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Register Pin', 'RegisterPin'); ?>
                                <?php echo form_input('RegisterPin',$User->RegisterPin); ?>
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
