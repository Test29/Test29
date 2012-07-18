<?php
$this->breadcrumbs=array(
	'Link Promotion Pictures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LinkPromotionPicture', 'url'=>array('index')),
	array('label'=>'Create LinkPromotionPicture', 'url'=>array('create')),
	array('label'=>'Update LinkPromotionPicture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LinkPromotionPicture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinkPromotionPicture', 'url'=>array('admin')),
);
?>

<h1>View LinkPromotionPicture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'picture_id',
		'promotion_id',
	),
)); ?>
