<?php
$this->breadcrumbs=array(
	'Schools'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List School', 'url'=>array('index')),
	array('label'=>'Create School', 'url'=>array('create')),
	array('label'=>'Update School', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete School', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage School', 'url'=>array('admin')),
);
?>


 
<img src="<?php echo Yii::app()->baseUrl ?><?php echo $model->picture->url; ?>" alt="picture_"/>	

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'name',		
		'description',		
	),
)); ?>
<br />
<h3>Promotions de <?php echo $model->name; ?></h3>
<br />
<?php foreach ($model->promotions as $promotion) { ?>
		<a href="<?php echo Yii::app()->baseUrl ?>/index.php/promotion/<?php echo $promotion->id; ?>"><?php echo $promotion->name; ?></a><br /><br />
<?php } ?>
<h3>Etudiants de <?php echo $model->name; ?></h3>				
<?php foreach ($model->studentschool as $student) { ?>
	<?php var_dump($student) or die(); ?>
<?php } ?>
