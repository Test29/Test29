<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_send')); ?>:</b>
	<?php echo CHtml::encode($data->date_send); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_read')); ?>:</b>
	<?php echo CHtml::encode($data->date_read); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('read')); ?>:</b>
	<?php echo CHtml::encode($data->read); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id_receive')); ?>:</b>
	<?php echo CHtml::encode($data->student_id_receive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id_send')); ?>:</b>
	<?php echo CHtml::encode($data->student_id_send); ?>
	<br />


</div>