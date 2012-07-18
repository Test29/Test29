<?php
$this->breadcrumbs=array(
	'Link Promotion Pictures',
);

$this->menu=array(
	array('label'=>'Create LinkPromotionPicture', 'url'=>array('create')),
	array('label'=>'Manage LinkPromotionPicture', 'url'=>array('admin')),
);
?>

<h1>Link Promotion Pictures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
