<?php
$this->breadcrumbs=array(
	'Schools'=>array('index')
);
?>

<div class="well">
<h2><?php echo $school['0']['name']; ?></h2>
<small><?php echo $school['0']['description']; ?></small>
</div>
<?php if ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable'){ ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nouvelle promotion',
    'type'=>'success',
    'size'=>'medium',
    'url'=>array('/promotion/create/'.$school['0']['id']),
)); ?><br /><br />
<?php } ?>
<table class="table table-striped space-table">
    <thead>
	<tr>
	<th>Promotion</th>
	</tr>
    </thead>
    <tbody>
    <?php foreach ($promotion as $key => $promotion) { ?>
	<td><h5><?php echo CHtml::link($promotion['name'], array('/promotion/view', 'id'=>$promotion['id'])); ?></h5></td>
    </tbody>
    <?php } ?>
</table>



