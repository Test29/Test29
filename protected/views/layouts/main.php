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
		  	 	 <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/student/create">Inscription</a></li>		
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
	<?php if (!isset($_SESSION['id']))
		{ ?>
			<div class="row-fluid">
				<div class="span3">
					<form id="form_connect" method="post" class="well form-horizontal" action="connect">					
						<div class="control-group">
							<label for="login" class="control-label">Login</label>
							<div class="controls">
								<input type="text" id="login" name="connect[login]" value="<?php if (isset($_POST['login'])){echo $_POST['login'];} ?>" placeholder="Entrez votre login" />
							</div>
						</div>
						<div class="control-group">
							<label for="password" class="control-label">Password</label>
							<div class="controls">
								<input type="text" id="password" name="connect[password]" placeholder="Entrez votre mot de passe" />
							</div>
						</div>
						<?php $this->widget('bootstrap.widgets.BootButton', array(
							 	'buttonType'=>'submit', 
							 	'icon'=>'ok white',
							    'label'=>'S\'identifier',
							    'type'=>'success',
							    'size'=>'large')); 
						?>
						<?php $this->widget('bootstrap.widgets.BootButton', array(
							 	'buttonType'=>'submit', 
							 	'icon'=>'ok white',
							    'label'=>'S\'inscrire',
							    'type'=>'primary',
							    'size'=>'large',
								'url'=>array('/student/create'))); 
						?>
					</form>
				</div>
			</div>
	<?php }
	else { ?>
		<h4>Bienvenue, <?php echo $_SESSION['login'] ?></h4>
	<?php } ?>
	<div class="container">
		<div class="row-fluid">
			<div class="row-fluid">
				<?php echo $content ?>
			</div>
		</div>
	</div>
</body>
</html>