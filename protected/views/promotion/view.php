<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Promotion', 'url'=>array('index')),
	array('label'=>'Create Promotion', 'url'=>array('create')),
	array('label'=>'Update Promotion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Promotion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promotion', 'url'=>array('admin')),
);
?>


<?php foreach ($model->promopict as $promopict) { ?>
		<img src="<?php echo Yii::app()->baseUrl ?><?php echo $promopict->picture->url; ?>" alt="promo_picture"/><br />
<?php } ?>
              
<h1>Promotion <?php echo $model->name; ?> de <?php echo $model->school->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'name',
		'year',
	),
)); ?>
<br />
<h3>Etudiants de <?php echo $model->name; ?></h3>
<br />
<?php foreach ($model->students as $student) { ?>
<a href="<?php echo Yii::app()->baseUrl ?>/index.php/student/<?php echo $student->id; ?>"><?php echo $student->login; ?></a><br /><br />
<?php } ?>