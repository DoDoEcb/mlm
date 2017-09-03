<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "UserReward"; ?>

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
								 <?php echo form_hidden('Id',$UserReward->Id); ?>
							</div>
							<div class="form-group">
                                 <?php echo form_label('User', 'UserId'); ?> 
                                 <?php echo Ajaxdropdown('UserId',$this->omodel->ddlUser(),$UserReward->UserId); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Reward', 'RewardId'); ?> 
                                 <?php echo Ajaxdropdown('RewardId',$this->omodel->ddlReward(),$UserReward->RewardId); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Date Rewarded', 'DateRewarded'); ?> 
                                 <?php
									$taDateRewarded = array (
											'name' => 'DateRewarded',
											'id' => 'DateRewarded',
											'value' =>$UserReward->DateRewarded,
											'width' => '200' 
									);
									?>
                                  <?php echo form_input($taDateRewarded); ?>
                                 <script> $(function () { $('#DateRewarded').datepicker({dateFormat: 'yy-mm-dd'}); }); </script>
							</div>
							<div class="form-group"> 
								 <?php echo form_hidden('AddedBy', $this->session->userdata('uid')); ?>
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
