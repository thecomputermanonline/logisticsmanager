<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'way_bill_number'); ?>
		<?php echo $form->textField($model, 'way_bill_number', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sender_id'); ?>
		<?php echo $form->textField($model, 'sender_id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'receiver_id'); ?>
		<?php echo $form->textField($model, 'receiver_id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'origin_code'); ?>
		<?php echo $form->textField($model, 'origin_code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'destination_code'); ?>
		<?php echo $form->textField($model, 'destination_code', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'packaging'); ?>
		<?php echo $form->textField($model, 'packaging', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'weight'); ?>
		<?php echo $form->textField($model, 'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'content_description'); ?>
		<?php echo $form->textArea($model, 'content_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'delivery_option'); ?>
		<?php echo $form->textField($model, 'delivery_option', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pod'); ?>
		<?php echo $form->textField($model, 'pod', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pickup_date'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'remark'); ?>
		<?php echo $form->textArea($model, 'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'recived_date'); ?>
		<?php echo $form->textField($model, 'recived_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->textField($model, 'user_id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'last_update'); ?>
		<?php echo $form->textField($model, 'last_update'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
