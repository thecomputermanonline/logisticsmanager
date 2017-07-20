<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('way_bill_number')); ?>:
	<?php echo GxHtml::encode($data->way_bill_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sender_id')); ?>:
	<?php echo GxHtml::encode($data->sender_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('receiver_id')); ?>:
	<?php echo GxHtml::encode($data->receiver_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('origin_code')); ?>:
	<?php echo GxHtml::encode($data->origin_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('destination_code')); ?>:
	<?php echo GxHtml::encode($data->destination_code); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('packaging')); ?>:
	<?php echo GxHtml::encode($data->packaging); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('weight')); ?>:
	<?php echo GxHtml::encode($data->weight); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('content_description')); ?>:
	<?php echo GxHtml::encode($data->content_description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('delivery_option')); ?>:
	<?php echo GxHtml::encode($data->delivery_option); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pod')); ?>:
	<?php echo GxHtml::encode($data->pod); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pickup_date')); ?>:
	<?php echo GxHtml::encode($data->pickup_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('remark')); ?>:
	<?php echo GxHtml::encode($data->remark); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('recived_date')); ?>:
	<?php echo GxHtml::encode($data->recived_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
	<?php echo GxHtml::encode($data->user_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_update')); ?>:
	<?php echo GxHtml::encode($data->last_update); ?>
	<br />
	*/ ?>

</div>