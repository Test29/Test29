<?php
$this->breadcrumbs=array(
	'Link Promotion Pictures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinkPromotionPicture', 'url'=>array('index')),
	array('label'=>'Create LinkPromotionPicture', 'url'=>array('create')),
	array('label'=>'View LinkPromotionPicture', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LinkPromotionPicture', 'url'=>array('admin')),
);
?>

<h1>Update LinkPromotionPicture <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>