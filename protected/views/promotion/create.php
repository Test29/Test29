<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Promotion', 'url'=>array('index')),
	array('label'=>'Manage Promotion', 'url'=>array('admin')),
);
?>

<h1>Create Promotion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>