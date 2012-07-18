<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture_id')); ?>:</b>
	<?php echo CHtml::encode($data->picture_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promotion_id')); ?>:</b>
	<?php echo CHtml::encode($data->promotion_id); ?>
	<br />


</div>