<h1>Cr&eacute;er un article</h1>
<form id="form" method="post" class="well form-horizontal" action="create">
    <div class="control-group <?php if (!empty($aErrorCreate['name'])) {echo 'error';}?>">
        <label class="control-label" for="name">Titre</label>
        <div class="controls">
            <input class="span6" id="name" name="article[name]" placeholder="Entrez le nom de la article" type="text" value="<?php if (isset($_POST['article']['name'])){echo $_POST['article']['name'];} ?>">
        </div>
    </div>
    <div class="control-group <?php if (!empty($aErrorCreate['content'])) {echo 'error';}?>">
        <label for="description" class="control-label">Contenu</label>
        <div class="controls">
            <textarea id="content" class="span6" name="article[content]" placeholder="Entrez le texte de l'article"><?php if (isset($_POST['article']['content'])){echo $_POST['article']['content'];} ?></textarea>
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