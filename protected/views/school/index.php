<?php
$this->breadcrumbs=array(
	'Schools')
?>
<h1>Ecole</h1>

<?php foreach ($schools as $key => $school) { ?>
	<h3><?php echo CHtml::link($school['name'], array('view', 'id'=>$school['id'])); ?></h3>			
<?php } ?>







