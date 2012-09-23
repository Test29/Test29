<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);?>

<h1>Update Student</h1>
<form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">create</legend>
      </div>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Identifiant</label>
          <div class="controls">
            <input placeholder="Entrez votre pseudo" class="input-xlarge" type="text">
            <p class="help-block">Supporting help text</p>
          </div>
        </div>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Mot de passe</label>
          <div class="controls">
            <input placeholder="Entrez votre mot de passe" class="input-xlarge" type="text">
            <p class="help-block">Supporting help text</p>
          </div>
        </div>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Email</label>
          <div class="controls">
            <input placeholder="Entrez votre email" class="input-xlarge" type="text">
            <p class="help-block">Supporting help text</p>
          </div>
        </div><div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Date de naissance</label>
          <div class="controls">
            <input placeholder="Selectionnez votre date de naissance" class="input-xlarge" type="text">
            <p class="help-block">Supporting help text</p>
          </div>
        </div><div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <!-- Multiple Checkboxes -->
            <label class="checkbox">
              <input value="Option one" type="checkbox">
              Femme
            </label>
            <label class="checkbox">
              <input value="Option two" type="checkbox">
              Homme
            </label>
          </div>
        </div>
    <div class="control-group">
          <!-- Select Basic -->
          <label class="control-label">Statut</label>
          <div class="controls">
            <select class="input-xlarge">
		      <option>Célibataire</option>
		      <option>En couple</option>
		      <option>Secret</option>
		    </select>
          </div>
        </div>
        <div class="control-group">
          <!-- Select Basic -->
          <label class="control-label">&amp;Eacute;coles</label>
          <div class="controls">
            <select class="input-xlarge">
		      <option>Enter</option>
		      <option>Your</option>
		      <option>Options</option>
		      <option>Here!</option>
      		</select>
          </div>
        </div>
        <div class="control-group">
          <!-- Select Basic -->
          <label class="control-label">Droits</label>
          <div class="controls">
            <select class="input-xlarge">
		      <option>Admin</option>
		      <option>Responsable</option>
		      <option>&Eacute;tudiants</option>
      		</select>
          </div>
        </div>
    </fieldset>
</form>