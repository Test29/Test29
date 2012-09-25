<?php
$this->breadcrumbs=array(

	'Schools')
?>


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
<?php if (isset($_SESSION['id']) && ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable')){ ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nouvelle école',
    'type'=>'success',
    'size'=>'medium',
    'url'=>array('/school/create'),
)); ?>
<br /><br />
<?php } ?>
<?php if (isset($_SESSION['id'])) { ?>
    <?php foreach ($schools as $key => $school) { ?>
	<ul class="thumbnails">
	<li class="span4">
	<div class="thumbnail">
	<img src="<?php echo $school['url']; ?>" alt="">
	<h3><?php echo CHtml::link($school['name'], array('view', 'id'=>$school['id'])); ?></h3>
	<p><?php echo $school['description']; ?></p>
	<?php if ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable'){ ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Modifier',
	'type'=>'info',
	'size'=>'medium',
	'url'=>array('/school/update/'.$school['id']),
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Supprimer',
	'type'=>'danger',
	'size'=>'medium',
	'url'=>array('/school/delete/'.$school['id']),
	'htmlOptions'=>array('confirm'=> 'Etes vous sûr de vouloir supprimer cette école ?'),
	)); ?>
	<?php } ?>
	</div>
	</li>
	</ul>
    <?php } ?>
<?php } else { ?>
    <?php foreach ($schools as $key => $school) { ?>
	<ul class="thumbnails">
	<li class="span4">
	<div class="thumbnail">
	<img src="<?php echo $school['url']; ?>" alt="">
	<h3><?php echo $school['name']; ?></h3>
	<p><?php echo $school['description']; ?></p>
	</div>
	</li>
	</ul>
    <?php } ?>
<?php } ?>




