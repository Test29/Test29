<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar">
    <div class="navbar-inner">
    	<div class="container">     
   		 <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
   			 <span class="icon-bar"></span>
   			 <span class="icon-bar"></span>
   			 <span class="icon-bar"></span>
   			 </a>     
    		<!-- Be sure to leave the brand out there if you want it shown -->
   			 <a class="brand" href="<?php echo Yii::app()->baseUrl ?>/index.php">AyBox</a>     
    		<!-- Everything you want hidden at 940px or less, place within here -->
    <div class="nav-collapse">    	
    	  <ul class="nav">
  		 	 <li class="active">
   				 <a href="<?php echo Yii::app()->baseUrl ?>/index.php">Home</a>
  		 	 </li>
  	 	 <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/school">Ecoles</a></li>  	   		
   		 </ul>
    </div>     
    	</div>
    </div>
</div>	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	<div class="clear"></div>
	<div id="footer">		
	</div>
</div>
</body>
</html>