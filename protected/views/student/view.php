<?php
if($student['0']['gender'] == 'male') { $gender = '../../images/male.png'; }
if($student['0']['gender'] == 'female') { $gender = '../../images/female.png'; }

if($student['0']['status'] == 'single') { $status = 'Célibataire'; }
if($student['0']['status'] == 'couple') { $status = 'En couple'; }
if($student['0']['status'] == 'no') { $status = 'Non défini'; }
?>
<?php $img_delete = '<i class=\'icon-trash\'></i>';
$imghtml='<i class=\'icon-pencil\'></i>';?>
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
	    <?php if ($_SESSION['id'] == $student['0']['id']){ ?>
            <div class="article">
                <h5><?php echo $article['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link($imghtml, array('/article/update', 'id'=>$article['id'])); ?>&nbsp;<?php echo CHtml::link($img_delete, array('/article/delete', 'id'=>$article['id']), array('confirm'=> 'Etes vous sûr de vouloir supprimer cette article ?')); ?></h5>
            </div>
	    <?php } else {?>
	    <div class="article">
                <h5><?php echo $article['name']; ?></h5>
            </div>
	    <?php } ?>
        <?php } ?>
    </div>
    <div class="span6">
         <div class="well">
             <?php if($_SESSION['id'] == $student['0']['id'])
             {
                if($messages[0]["COUNT('id')"] == 0)
		{
		    echo CHtml::link('Aucun nouveau message', array('/message/view','id'=>$_SESSION['id']));
		}
                else
                {
		    echo CHtml::link('Vous avez '.$messages[0]["COUNT('id')"].' nouveaux messages', array('/message/view','id'=>$_SESSION['id']));
		}
              } ?>
	     <?php if ($_SESSION['id'] != $_GET['id']){ ?>
             <?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Envoyer un message',
	    'type'=>'primary',
	    'size'=>'medium',
	    'url'=>array('/message/create/'.$_GET['id']),
	    )); ?>
	    <?php } ?>
        </div>
    </div>
</div>

