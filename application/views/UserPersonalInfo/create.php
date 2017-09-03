<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "UserPersonalInfo"; ?>

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
                                <?php echo form_label('First Name', 'FirstName'); ?>
                                <?php echo form_input('FirstName'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Last Name', 'LastName'); ?>
                                <?php echo form_input('LastName'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Gender', 'GenderId'); ?>
                                 
                                 <?php echo Ajaxdropdown('GenderId',$this->omodel->ddlGender()); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('About', 'About'); ?>
                                 <?php
									$taAbout = array (
											'name' => 'About',
											'id' => 'About',
											'value' => '',
											'rows' => '2',
											'class' => 'ckeditor' 
									);
									?>
                                 <?php echo form_textarea($taAbout); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Profile Image', 'ProfileImage'); ?>
                                <?php echo form_upload('ProfileImage'); ?> 
                            </div>
							<div class="form-group"> 
								 <?php echo form_hidden('DateJoin', date('y/m/d h:m:s') )  ?>
							</div>
							<div class="form-group">
                                 <?php echo form_label('User', 'UserId'); ?>
                                 
                                 <?php echo Ajaxdropdown('UserId',$this->omodel->ddlUser()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Middle Name', 'MiddleName'); ?>
                                <?php echo form_input('MiddleName'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Email', 'EmailId'); ?>
                                <?php echo form_input('EmailId'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Father And Spouse Name', 'FatherAndSpouseName'); ?>
                                <?php echo form_input('FatherAndSpouseName'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('D O B', 'DOB'); ?> 
                                 <?php
									$taDOB = array (
											'name' => 'DOB',
											'id' => 'DOB',
											'value' =>'',
											'width' => '200' 
									);
									?>
                                  <?php echo form_input($taDOB); ?>
                                 <script> $(function () { $('#DOB').datepicker({dateFormat: 'yy-mm-dd'}); }); </script>
							</div>
							<div class="form-group">
                                <?php echo form_label('Mother Name', 'MotherName'); ?>
                                <?php echo form_input('MotherName'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Nomine Name', 'NomineName'); ?>
                                <?php echo form_input('NomineName'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('City', 'CityId'); ?>
                                 
                                 <?php echo Ajaxdropdown('CityId',$this->omodel->ddlCity()); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Zip Code', 'ZipCode'); ?>
                                <?php echo form_input('ZipCode'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Pan Number', 'PanNumber'); ?>
                                <?php echo form_input('PanNumber'); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Education Detail', 'EducationDetail'); ?> <br />
                                 <?php
									$taEducationDetail = array (
											'name' => 'EducationDetail',
											'id' => 'EducationDetail',
											'value' => '',
											'rows' => '2',
											'class' => '' 
									);
									?>
                                  <?php echo form_textarea($taEducationDetail); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Last Employee Firm', 'LastEmployeeFirm'); ?>
                                <?php echo form_input('LastEmployeeFirm'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Last Employee Year', 'LastEmployeeYear'); ?>
                                <?php echo form_input('LastEmployeeYear'); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Last Employee Anual Income', 'LastEmployeeAnualIncome'); ?>
                                <?php echo form_input('LastEmployeeAnualIncome'); ?>
                            </div>
							<div class="form-group">
                                  <?php echo form_label('Is Active', 'IsActive'); ?>
                                  <?php echo form_checkbox('IsActive',true); ?> 
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
