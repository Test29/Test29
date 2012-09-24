
<h1>Modification d'une promotion</h1>
<form id="form" method="post" class="well form-horizontal" action="update">
    <div class="control-group <?php if (!empty($aErrorUpdate['name'])) {echo 'error';}?>">
        <label class="control-label" for="name">Nom</label>
        <div class="controls">
            <input class="span6" id="name" name="promotion[name]" placeholder="Entrez le nom de la promotion" type="text" value="<?php if (isset ($promotion['name'])){ echo $promotion['name']; } else if (isset($_POST['promotion']['name'])){echo $_POST['promotion']['name'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorUpdate['year'])) {echo 'error';}?>">
        <label class="control-label" for="name">Année</label>
        <div class="controls">
            <input class="span6" id="name" name="promotion[year]" placeholder="Entrez l'année de la promotion" type="text" value="<?php if (isset ($promotion['year'])){ echo $promotion['year']; } else if (isset($_POST['promotion']['year'])){echo $_POST['promotion']['year'];} ?>" maxlength="4">
        </div>
    </div>
    <input type="hidden" name="promotion[id]" value="<?php if (isset($_POST['promotion']['id'])){echo $_POST['promotion']['id'];} else if (isset($promotion['id'])){echo $promotion['id'];}?>"/>
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