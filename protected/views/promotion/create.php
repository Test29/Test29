<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Create',
);
?>

<h1>Cr&eacute;er une promotion</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group <?php if (!empty($aErrorCreate['name'])) {echo 'error';}?>">
        <label class="control-label" for="name">Nom</label>
        <div class="controls">
            <input class="span6" id="name" name="promotion[name]" placeholder="Entrez le nom de la promotion" type="text" value="<?php if (isset($_POST['promotion']['name'])){echo $_POST['promotion']['name'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['year'])) {echo 'error';}?>">
        <label class="control-label" for="year">Année</label>
        <div class="controls">
            <input class="span6" id="name" name="promotion[year]" placeholder="Entrez l'année de la promotion" type="text" value="<?php if (isset($_POST['promotion']['year'])){echo $_POST['promotion']['year'];} ?>" maxlength="4">
        </div>
    </div>
    <input type="hidden" name="promotion[id]" value="<?php if (isset($_POST['promotion']['id'])){echo $_POST['promotion']['id'];} else if (isset($_GET['promotion']['id'])){echo $_GET['promotion']['id'];}?>"/>
    <div class="control-group">
        <div class="controls">
                <?php $this->widget('bootstrap.widgets.TbButton',
                        array('buttonType'=>'submit',
                              'icon'=>'ok white',
                              'label'=>'Créer',
                              'type'=>'primary',
                              'size'=>'large'));
                ?>
        </div>
    </div>
</form>