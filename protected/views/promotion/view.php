<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	
);
?>
<div class="well">
    <h3><?php echo $promotion['0']['school']; ?></h3>
    <h5><?php echo $promotion['0']['name']; ?></h5>
    <small>Année :<?php echo $promotion['0']['year']; ?>
</small>
</div>

<table class="table table-striped space-table">
    <thead>
            <tr>   					
            <th>Etudiants</th>  			
            </tr>
    </thead>		
    <tbody>			
    <?php foreach ($students as $key => $student) { ?>
            <td><h5><?php echo CHtml::link($student['login'], array('/student/view', 'id'=>$student['id'])); ?></h5></td>
           	
    </tbody>
    <?php } ?>			
</table>