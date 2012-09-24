<?php
$this->breadcrumbs=array(

	'Schools')
?>


<?php if(Yii::app()->user->hasFlash('info')): ?>
<div class="alert alert-success">
    <?php echo Yii::app()->user->getFlash('info'); ?>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')): ?>
<div class="alert alert-error">
    <?php echo Yii::app()->user->getFlash('error'); ?>
</div>
<?php endif; ?>
<h1>Ecole</h1>
<?php if ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable'){ ?>
<button class=" btn btn-success">Nouvelle école</button><br /><br />
<?php } ?>

<?php foreach ($schools as $key => $school) { ?>
    <ul class="thumbnails">
    <li class="span4">
    <div class="thumbnail">
    <img src="<?php echo $school['url']; ?>" alt="">
    <h3><?php echo CHtml::link($school['name'], array('view', 'id'=>$school['id'])); ?></h3>
    <p><?php echo $school['description']; ?></p>
    <?php if ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'responsable'){ ?>
    <button class="btn btn-info">Modifier</button>
    <button class="btn btn-danger">Supprimer</button>
    <?php } ?>
    </div>
    </li>
    </ul>
<?php } ?>





