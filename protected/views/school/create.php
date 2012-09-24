<?php
$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Create',
);?>

<h1>Inscription d'une &Eacute;cole</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group <?php if (!empty($aErrorCreate['name'])) {echo 'error';}?>">
        <label class="control-label" for="name">Nom</label>
        <div class="controls">
            <input class="span6" id="name" name="school[name]" placeholder="Entrez le nom de l'&eacute;cole" type="text" value="<?php if (isset($_POST['school']['name'])){echo $_POST['school']['name'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['description'])) {echo 'error';}?>">
        <label for="description" class="control-label">Description</label>
        <div class="controls">
            <textarea id="description" class="span6" name="school[description]" placeholder="Entrez une description de l'&eacute;cole"><?php if (isset($_POST['school']['description'])){echo $_POST['school']['description'];} ?></textarea>
        </div>
    </div>
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