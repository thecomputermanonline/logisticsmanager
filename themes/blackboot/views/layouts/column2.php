<?php
		function getMenuItems ()
		{
		return array(
				
	/*array('label'=>'Install', 'url'=>array('install/index'), 'visible'=>($this->module->install)),
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>($this->module->install)), // separator
    */
	array('label'=>'Settings', 'url'=>array('settings/batchUpdate'), 'visible'=>(Yii::app()->user->checkAccess("settings_manage"))),
	
    
	array('label'=>'My Profile (' . Yii::app()->user->name . ')', 'url'=>array('users/viewMyPrivateProfile', 'id'=>Yii::app()->user->id), 'visible'=>(Yii::app()->user->checkAccess("users_myprofile") && (!isset($model) || Yii::app()->user->id != $model->id))),
    
	
	 
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(Yii::app()->user->checkAccess("users_manage") && (!isset($model) || Yii::app()->user->id != $model->id))), // separator
	 array('label'=>'View Profile', 'url'=>array('users/viewProfile', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'View Private Profile', 'url'=>array('users/viewMyPrivateProfile', 'id'=>$model->id), 'visible'=>((Yii::app()->user->id === $model->id) || Yii::app()->user->checkAccess('users_all_privateProfile_view'))),
		 array('label'=>'View Profile', 'url'=>array('users/viewProfile', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'View Private Profile', 'url'=>array('users/viewMyPrivateProfile', 'id'=>$model->id), 'visible'=>((Yii::app()->user->id === $model->id) || Yii::app()->user->checkAccess('users_all_privateProfile_view'))),
    
	
    
	array('template'=>'<HR style="margin:0 auto;"/>'), // separator
	
	array('label'=>'My Consignments (' . Yii::app()->user->name . ')', 'url'=>array('consignments/viewMyConsignments', 'id'=>Yii::app()->user->id), 'visible'=>(Yii::app()->user->checkAccess("users_myprofile") )),
    
	
    
	/*array('label'=>'invite', 'url'=>'#', 
        'linkOptions'=>array(
                'onclick'=>'invitationDialog(
                        "' . Yii::app()->createUrl($this->module->name . "/invitations/AJAXCreate", array('id_user'=>Yii::app()->user->id)) . '",
                        "' . Yii::app()->createUrl($this->module->name . "/invitations/AJAXView", array('id_user'=>Yii::app()->user->id)) . '"
                    );' 
            ), 
        'visible'=>(!Yii::app()->user->isGuest && Yii::app()->getModule('bum')->invitationButtonDisplay)),
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->getModule('bum')->invitationButtonDisplay)), // separator*/
    array('label'=>'Manage Consignment', 'url'=>array('consignments/admin'), 'visible'=>Yii::app()->user->checkAccess("consignment_manage")),
	 array('label'=>'Create Consignment', 'url'=>array('consignments/create'), 'visible'=>Yii::app()->user->checkAccess("consignment_manage")),
	 array('template'=>'<HR style="margin:0 auto;"/>'), // separator
	array('label'=>'Manage Users', 'url'=>array('users/admin'), 'visible'=>Yii::app()->user->checkAccess("users_admin")),
	array('label'=>'Create User', 'url'=>array('users/create'), 'visible'=>Yii::app()->user->checkAccess("users_create")),
	array('label'=>'View all Users', 'url'=>array('users/viewAllUsers'), 'visible'=>Yii::app()->user->checkAccess("users_all_view"), 'active'=>true),
    
	/*array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>($this->module->logInIfNotVerified && !Yii::app()->user->active && !Yii::app()->user->isGuest)), // separator
	array('label'=>'Resend Confirm. Email', 'url'=>array('users/resendSignUpConfirmationEmail'), 'visible'=>($this->module->logInIfNotVerified && !Yii::app()->user->active && !Yii::app()->user->isGuest)),*/
);
}
?>

<?php $this->beginContent('//layouts/main'); ?>
      <div class="row-fluid">
        <div class="span3">
         <?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>getMenuItems(),
				'htmlOptions'=>array('class'=>'sidebar'),
			));
			//$this->widget('BumMenu');
			$this->endWidget();
			
		?>
		</div><!-- sidebar span3 -->

	<div class="span9">
		<div class="main">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>

