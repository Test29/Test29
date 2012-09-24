<h1>Envoyer un message</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group <?php if (!empty($aErrorCreate['content'])) {echo 'error';}?>">
        <label for="description" class="control-label">Message</label>
        <div class="controls">
            <textarea id="content" class="span6" name="message[content]" placeholder="Entrez le texte du message"><?php if (isset($_POST['message']['content'])){echo $_POST['message']['content'];} ?></textarea>
        </div>
    </div>
    <input type="hidden" name="message[id]" value="<?php if (isset($_POST['message']['id'])){echo $_POST['message']['id'];} else if (isset($_GET['id'])){echo $_GET['id'];}?>"/>
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