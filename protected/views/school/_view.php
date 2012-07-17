<div class="view">
	<b>	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></b>	
	<div>
		<?php echo CHtml::encode($data->picture_id); ?>
		<img src="" alt="picture_school"/>
	</div>	
</div>