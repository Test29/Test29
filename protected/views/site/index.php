<div class="span10">
	<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	    'heading'=>'AyBox',
	)); ?>

	    <p>Venez retrouver votre école et partager sur AyBox</p>
	    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
	        'type'=>'primary',
	        'size'=>'large',
	        'label'=>'Commencer',
		'url'=>array('/student/create/')
	    )); ?></p>

	    <p>AyBox vous permet de fédérer une promo au sein d’une école supérieure.
	    C’est une alternative entre un réseau social où il n’y aurait que du divertissement et un
	    Intranet privé qui se voudrait trop scolaire.
	    Vous pouvez ainsi retrouver vos camarades, discuter d’un cours, organiser du
	    soutien scolaire ou partager toutes autres informations relative à votre école.
	    </p>

	<?php $this->endWidget(); ?>
</div>