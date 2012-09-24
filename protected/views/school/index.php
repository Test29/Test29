<?php
$this->breadcrumbs=array(
	'Schools',
);?>
<?php if(Yii::app()->user->hasFlash('info')): ?>
<div class="alert alert-success">
    <?php echo Yii::app()->user->getFlash('info'); ?>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')): ?>
<div class="alert alert-error">
    <?php echo Yii::app()->user->getFlash('error'); ?>
</div>
<?php endif; ?>
<h1>Ecole</h1>



