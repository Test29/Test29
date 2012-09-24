
<h1>Modification d'une &Eacute;cole</h1>
<form id="form" method="post" class="well form-horizontal" action="update">
    <div class="control-group <?php if (!empty($aErrorUpdate['name'])) {echo 'error';}?>">
        <label class="control-label" for="name">Identifiant</label>
        <div class="controls">
            <input class="span6" id="name" name="school[name]" placeholder="Entrez le nom de l'&eacute;cole" type="text" value="<?php if (isset ($school['name'])){ echo $school['name']; } else if (isset($_POST['school']['name'])){echo $_POST['school']['name'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorUpdate['description'])) {echo 'error';}?>">
        <label for="description" class="control-label">Description</label>
        <div class="controls">
            <textarea id="description" class="span6" name="school[description]" placeholder="Entrez une description de l'&eacute;cole"><?php if (isset ($school['description'])){ echo $school['description']; } else if (isset($_POST['school']['description'])){echo $_POST['school']['description'];} ?></textarea>
        </div>
    </div>
    <input type="hidden" name="school[id]" value="<?php if (isset($_POST['school']['id'])){echo $_POST['school']['id'];} else if (isset($school['id'])){echo $school['id'];}?>"/>
    <div class="control-group">
        <div class="controls">
                <?php $this->widget('bootstrap.widgets.TbButton',
                        array('buttonType'=>'submit',
                              'icon'=>'ok white',
                              'label'=>'Modifier',
                              'type'=>'primary',
                              'size'=>'large'));
                ?>
        </div>
    </div>
</form>