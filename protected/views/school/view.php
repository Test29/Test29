<?php
$this->breadcrumbs=array(
	'Schools'=>array('index')	
);
?>
<h2><?php echo $school['0']['name']; ?></h2>
        <h4><?php echo $school['0']['date_add']; ?></h4>
        <h4><?php echo $school['0']['date_update']; ?></h4>
        <h4><?php echo $school['0']['description']; ?></h4>

<?php foreach ($promotion as $key => $promotion) { ?>
	<h3><?php echo CHtml::link($promotion['name'], array('/promotion/view', 'id'=>$promotion['id'])); ?></h3>			
<?php } ?>