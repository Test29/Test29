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

<h1>View Promotion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'year',
		'date_add',
		'date_update',
		'school_id',
	),
)); ?>
