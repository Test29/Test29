<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="fr" />
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

<div class="navbar navbar-inverse">
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
                            <a href="<?php echo Yii::app()->baseUrl ?>/index.php">Accueil</a>
                    </li>
                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/school">&Eacute;coles</a></li>
                    <?php if (!isset($_SESSION['id']))
                    { ?>
                        <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/student/create">Inscription</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/student/update/<?php echo $_SESSION['id'] ?>">Modification du profil</a></li>
                    <?php } ?>
                </ul>
                <?php if (isset($_SESSION['id']))
                { ?>
                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl ?>/index.php/student/deconnect">Se déconnecter</a>
                    </li>
                </ul>
                <?php } else { ?>
                    <form id="form_connect" method="post" class="navbar-form form-horizontal pull-right" action="<?php echo Yii::app()->baseUrl ?>/index.php/student/connect">
                            <input type="text" id="login" class="span2" name="connect[login]" value="<?php if (isset($_POST['login'])){echo $_POST['login'];} ?>" placeholder="Identifiant" />
                            <input type="password" id="password" class="span2" name="connect[password]" placeholder="Mot de passe" />
                            <button type="submit" class="btn btn-success">S'identifier</button>
                    </form>
                <?php } ?>
            </div>
    	</div>
    </div>
</div>
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    <?php if (isset($_SESSION['id'])){ ?>
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