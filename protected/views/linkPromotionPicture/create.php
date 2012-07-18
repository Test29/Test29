<?php
$this->breadcrumbs=array(
	'Link Promotion Pictures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinkPromotionPicture', 'url'=>array('index')),
	array('label'=>'Manage LinkPromotionPicture', 'url'=>array('admin')),
);
?>

<h1>Create LinkPromotionPicture</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>