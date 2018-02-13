<?= $this->alert->getRedirectMessage() ?>

<h2>Edit Project <?= $project->name ?></h2>

<?= $this->tag->form(['projects/save', 'role' => 'form', 'id' => 'dataForm', 'class' => 'ui form']) ?>

    <?php foreach ($form as $element) { ?>
    
        <?php if (is_a($element, 'Phalcon\Forms\Element\Hidden')) { ?>
            <?= $element ?>
        <?php } else { ?>
            <div id="name_div" class="<?= ($this->length($element->getValidators()) > 0 ? 'required' : '') ?> field">
                <?= $element->label() ?>
                <?= $element->render() ?>
                <div class="ui basic red pointing prompt label transition hidden" id="name_alert">Please enter a project name</div>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="ui error message"></div>

    <?= $this->tag->submitButton(['Save Changes', 'class' => 'ui primary button', 'onclick' => 'return Save.validate();']) ?>
    <a href="../../projects" class="ui button">Cancel</a>

</form>


<?php if (isset($messages)) { ?>
    <?= $this->alert->getSystemMessage($messages) ?>
<?php } ?>