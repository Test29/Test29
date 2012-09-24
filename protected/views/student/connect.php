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
<div class="connect">
	<h1>Veuillez vous connecter gr&acirc;ce au module de connection en haut à droite</h1>
</div>