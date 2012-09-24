<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	
);
?>
<div class="well">
    <h3><?php echo $promotion['0']['school']; ?></h3>
    <button class="btn btn-success">Rejoindre cette promotion</button>
    <h5><?php echo $promotion['0']['name']; ?></h5>
    <small>Année :<?php echo $promotion['0']['year']; ?>
</small>
</div>

<button class="btn btn-info">Modifier promotion</button>
<button class="btn btn-danger">Supprimer promotion</button><br /><br />

<div class="row-fluid">
    <div class="span10">
        <h3>Actualités</h3>
         <?php foreach ($articles as $key => $article) { ?>
            <div class="article">
                <h5>Ecrit par : <?php echo $article['login']; ?> le <?php echo $article['date_add']; ?></h5>
                <h4><?php echo $article['name']; ?></h4><br />
                <p><?php echo $article['content'] ?></p><br />
            </div>
        <?php } ?>
   </div>
    <div class="span2">
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
    </div>