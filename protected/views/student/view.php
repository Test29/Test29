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
        <h4>Les news de mon école</h4>
        <h4>Mes articles</h4>
    </div>
    <div class="span6">
         <div class="well">
             <h4>Aucun nouveau message</h4><h5>Voir la liste de mes camarades</h5>
             <button class="btn btn-primary">Envoyer un message</button>
        </div>
    </div>
</div>     

