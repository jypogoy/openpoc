<h2>New Project</h2>

<?= $this->getContent() ?>

<?= $this->tag->form(['projects/create', 'class' => 'ui form']) ?>

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

    <?= $this->tag->submitButton(['Save', 'class' => 'ui primary button', 'onclick' => 'return SaveProject.validate();']) ?>
    <?= $this->tag->submitButton(['Save & New', 'class' => 'ui teal button']) ?>
    <a href="../projects" class="ui button">Cancel</a>

</form>

<?= $this->tag->javascriptInclude('js/projects_new.js') ?>