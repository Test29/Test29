<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
); ?>

<h1>Create Student</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="login">Identifiant</label>
          <div class="controls">
            <input class="span6" id="login" name="student[login]" placeholder="Entrez votre pseudo" type="text">
          </div>
        </div>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="password">Mot de passe</label>
          <div class="controls">
            <input class="span6" id="password" name="student[password]" placeholder="Entrez votre mot de passe" type="text">
          </div>
        </div>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input class="span6" id="email" name="student[email]" placeholder="Entrez votre email" type="text">
          </div>
        </div><div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="dob">Date de naissance</label>
          <div class="controls">
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	    								'name'=>'student[dob]',
	    								'id'=>'dob',
	    								'language'=>'fr',
									    'options'=>array(
									    'dateFormat'=>'yy-mm-dd',
	     							    'showAnim'=>'show', ),
									    'htmlOptions'=>array(
	       							    'style'=>'height:20px;',
										'class'=>'span6',
									    'placeholder'=>'Sélectionnez votre date de naissance'))); ?>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="radio">
				<input type="radio" name="student[gender]" value="female" >
				Femme
			</label>
			<label class="radio">
				<input type="radio" name="student[gender]" value="male">
				Homme
			</label>
          </div>
        </div>
    <div class="control-group">
          <!-- Select Basic -->
          <label class="control-label">Statut</label>
          <div class="controls">
            <select class="span6" id="statut" name="student[status]">
		      <option>Célibataire</option>
		      <option>En couple</option>
		      <option>Secret</option>
		    </select>
          </div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				 	'buttonType'=>'submit', 
				 	'icon'=>'ok white',
				    'label'=>'Créer',
				    'type'=>'primary',
				    'size'=>'large')); 
			?>
		</div>
	</div>
</form>