<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_send'); ?>
		<?php echo $form->textField($model,'date_send'); ?>
		<?php echo $form->error($model,'date_send'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_read'); ?>
		<?php echo $form->textField($model,'date_read'); ?>
		<?php echo $form->error($model,'date_read'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'read'); ?>
		<?php echo $form->textField($model,'read',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'read'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id_receive'); ?>
		<?php echo $form->textField($model,'student_id_receive'); ?>
		<?php echo $form->error($model,'student_id_receive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_id_send'); ?>
		<?php echo $form->textField($model,'student_id_send'); ?>
		<?php echo $form->error($model,'student_id_send'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->