<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'consignments-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'way_bill_number'); ?>
		<?php echo $form->textField($model, 'way_bill_number', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'way_bill_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sender_id'); ?>
		<?php echo $form->textField($model, 'sender_id', array('maxlength' => 11)); ?>
		<?php echo $form->error($model,'sender_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'receiver_id'); ?>
		<?php echo $form->textField($model, 'receiver_id', array('maxlength' => 11)); ?>
		<?php echo $form->error($model,'receiver_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'origin_code'); ?>
		<?php echo $form->textField($model, 'origin_code', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'origin_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'destination_code'); ?>
		<?php echo $form->textField($model, 'destination_code', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'destination_code'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'packaging'); ?>
		<?php echo $form->textField($model, 'packaging', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'packaging'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model, 'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content_description'); ?>
		<?php echo $form->textArea($model, 'content_description'); ?>
		<?php echo $form->error($model,'content_description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'delivery_option'); ?>
		<?php echo $form->textField($model, 'delivery_option', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'delivery_option'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pod'); ?>
		<?php echo $form->textField($model, 'pod', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'pod'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pickup_date'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'pickup_date',
			'value' => $model->pickup_date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'pickup_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 15)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textArea($model, 'remark'); ?>
		<?php echo $form->error($model,'remark'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'recived_date'); ?>
		<?php echo $form->textField($model, 'recived_date'); ?>
		<?php echo $form->error($model,'recived_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id', array('maxlength' => 11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'last_update'); ?>
		<?php echo $form->textField($model, 'last_update'); ?>
		<?php echo $form->error($model,'last_update'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->