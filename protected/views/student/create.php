<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
); ?>

<h1>Inscription</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group <?php if (!empty($aErrorCreate['login'])) {echo 'error';}?>">
        <label class="control-label" for="login">Identifiant</label>
        <div class="controls">
            <input class="span6" id="login" name="student[login]" placeholder="Entrez votre pseudo" type="text" value="<?php if (isset($_POST['student']['login'])){echo $_POST['student']['login'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['password'])) {echo 'error';}?>">
        <label class="control-label" for="password">Mot de passe</label>
        <div class="controls">
            <input class="span6" id="password" name="student[password]" placeholder="Entrez votre mot de passe" type="password" value="<?php if (isset($_POST['student']['password'])){echo $_POST['student']['password'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['email'])) {echo 'error';}?>">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input class="span6" id="email" name="student[email]" placeholder="Entrez votre email" type="email" value="<?php if (isset($_POST['student']['email'])){echo $_POST['student']['email'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['dob'])) {echo 'error';}?>">
        <label class="control-label" for="dob">Date de naissance</label>
        <div class="controls">
          <?php $date = '';
          if (isset($_POST['student']['dob'])){$date = $_POST['student']['dob'];}
          $this->widget('zii.widgets.jui.CJuiDatePicker',
                  array(
                  'name'=>'student[dob]',
                  'id'=>'dob',
                  'value'=>$date,
                  'language'=>'fr',
                      'options'=>array(
                      'dateFormat'=>'yy-mm-dd',
                      'showAnim'=>'show',),
                      'htmlOptions'=>array(
                      'style'=>'height:20px;',
                      'class'=>'span6',
                      'placeholder'=>'Sélectionnez votre date de naissance'))); ?>
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['gender'])) {echo 'error';}?>">
        <div class="controls">
            <label class="radio">
                <input type="radio" name="student[gender]" value="female" <?php if ((isset($_POST['student']['gender'])) && ($_POST['student']['gender'] == 'female')) {echo 'checked="checked"';}?>>
                Femme
            </label>
            <label class="radio">
                <input type="radio" name="student[gender]" value="male" <?php if ((isset($_POST['student']['gender'])) && ($_POST['student']['gender'] == 'male')) {echo 'checked="checked"';}?>>
                Homme
            </label>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Statut</label>
        <div class="controls">
            <select class="span6" id="statut" name="student[status]">
                <option <?php if ((isset($_POST['student']['status'])) && ($_POST['student']['status'] == 'single')) {echo 'selected="selected"';}?>>Célibataire</option>
                <option <?php if ((isset($_POST['student']['status'])) && ($_POST['student']['status'] == 'couple')) {echo 'selected="selected"';}?>>En couple</option>
                <option <?php if ((isset($_POST['student']['status'])) && ($_POST['student']['status'] == 'no')) {echo 'selected="selected"';}?>>Secret</option>
            </select>
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