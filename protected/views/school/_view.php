<div class="view">
	<h3><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></h3>	
	<div>	
		<img src="<?php echo Yii::app()->baseUrl ?><?php echo $data->picture->url; ?>" alt="picture_school"/>	
	</div>	
</div>