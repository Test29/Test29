<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),

);
?>
<div class="well">
    <h3><?php echo $promotion['0']['school']; ?></h3>
    <?php if ($_SESSION['right'] == 'student' || $_SESSION['right'] == 'responsable'){ ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Rejoindre promotion',
    'type'=>'success',
    'size'=>'medium',
    'url'=>array('/promotion/delete/'.$promotion['0']['id']),
    'htmlOptions'=>array('confirm'=> 'Etes vous sûr de vouloir rejoindre cette promotion ?'),
    )); ?>
    <?php } ?>
    <h5><?php echo $promotion['0']['name']; ?></h5>
    <small>Année :<?php echo $promotion['0']['year']; ?>
</small>
</div>
<?php if ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable'){ ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Modifier promotion',
    'type'=>'info',
    'size'=>'medium',
    'url'=>array('/promotion/update/'.$promotion['0']['id']),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Supprimer promotion',
    'type'=>'danger',
    'size'=>'medium',
    'url'=>array('/promotion/delete/'.$promotion['0']['id']),
    'htmlOptions'=>array('confirm'=> 'Etes vous sûr de vouloir supprimer cette promotion ?'),
    )); ?>
<?php } ?>
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
	     <?php if ($_SESSION['id'] != $student['id']){ ?>
             <td><h5><?php echo CHtml::link($student['login'], array('/student/view', 'id'=>$student['id'])); ?></h5></td>
	     <?php } ?>
	</tbody>
         <?php } ?>
     </table>
    </div>