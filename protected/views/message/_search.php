<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_send'); ?>
		<?php echo $form->textField($model,'date_send'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_read'); ?>
		<?php echo $form->textField($model,'date_read'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'read'); ?>
		<?php echo $form->textField($model,'read',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_id_receive'); ?>
		<?php echo $form->textField($model,'student_id_receive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_id_send'); ?>
		<?php echo $form->textField($model,'student_id_send'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->