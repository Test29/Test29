<?php
if($student['0']['gender'] == 'male') { $gender = '../../images/male.png'; }
if($student['0']['gender'] == 'female') { $gender = '../../images/female.png'; }

if($student['0']['status'] == 'single') { $status = 'Célibataire'; }
if($student['0']['status'] == 'couple') { $status = 'En couple'; }
if($student['0']['status'] == 'no') { $status = 'Non défini'; }
?>
<?php

$this->breadcrumbs=array(
	'Students'=>array('index')
);
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
<div class="row-fluid">
    <div class="span6">
        <div class="well">
            <img src="../../images/profil.png" class="img-polaroid">
            <h4><?php echo $student['0']['login'] ?><img src="<?php echo $gender; ?>"/></h4>
        </div>
    </div>
    <div class="span6">
        <div class="well">
            <h5>Né le : <?php echo $student['0']['dob'] ?></h5>
            <h5><?php echo $student['0']['email'] ?></h5>
            <h5><?php echo $status; ?></h5>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
	<?php if ($_SESSION['promotion_id'] != 1){ ?>
        <h4><?php echo CHtml::link('Voir le journal de la promotion', array('/promotion/view','id'=>$student[0]['promotion_id'])) ?>
        </h4><br /><br />
	<?php } ?>
        <h4>Les articles de <?php echo $student['0']['login']; ?></h4>
          <?php foreach ($articles as $key => $article) { ?>
            <div class="article">
                <h5><?php echo $article['name']; ?></h5>
            </div>
        <?php } ?>
    </div>
    <div class="span6">
         <div class="well">
             <h4>Aucun nouveau message</h4><h5>Voir la liste de mes camarades</h5>
	     <?php if ($_SESSION['id'] != $_GET['id']){ ?>
             <button class="btn btn-primary">Envoyer un message</button>
	     <?php } ?>
        </div>
    </div>
</div>

