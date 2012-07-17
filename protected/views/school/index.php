<?php
$this->breadcrumbs=array(
	'Schools',
);

$this->menu=array(
	array('label'=>'Create School', 'url'=>array('create')),
	array('label'=>'Manage School', 'url'=>array('admin')),
);
?>

<h1>Ecole</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',	
	'sortableAttributes'=>array(
        'name'=>'cdvfvdfsfvfvsdv','picture_id'=>'photo'       
    ),
)); ?>


