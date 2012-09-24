<?php if($student['0']['gender'] == 'male') { $gender = '../../images/male.png'; }
if($student['0']['gender'] == 'female') { $gender = '../../images/female.png'; } ?>
<?php
$this->breadcrumbs=array(
	'Students'=>array('index')
);
?>
<div class="row-fluid">
    <div class="span6">
        <div class="well">
            <h4><?php echo $student['0']['login'] ?><img src="<?php echo $gender; ?>"/></h4>
        </div>
    </div>
    <div class="span6">
        <div class="well">
            <h5><?php echo $student['0']['dob'] ?></h5>
            <h5><?php echo $student['0']['email'] ?></h5>
            <h5><?php echo $student['0']['status'] ?></h5>            
        </div>
    </div>
</div>

