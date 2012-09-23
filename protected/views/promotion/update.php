<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Promotion', 'url'=>array('index')),
	array('label'=>'Create Promotion', 'url'=>array('create')),
	array('label'=>'View Promotion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Promotion', 'url'=>array('admin')),
);
?>

<h1>Update Promotion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>