<div class="ui segment">
    <a class="ui blue ribbon label"><i class="random icon"></i>WORK FLOW</a>
    <button class="ui right floated icon small primary button" id="btnAddWorkflow" data-tooltip="Add work flow" data-position="bottom center">
        <i class="plus icon"></i>
    </button>
    <p></p>
    <table class="ui celled striped table">
    <thead>
        <tr>
            <th class="five wide">NAME</th>
            <th class="nine wide">DESCRIPTION</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    
        <?php $v3853890471iterated = false; ?><?php foreach ($workflows as $workflow) { ?><?php $v3853890471iterated = true; ?>
        <tr>
            <td><?= $workflow->name ?></td>
            <td><?= $workflow->description ?></td>
            <td>
                <a class="ui icon" data-tooltip="Edit" data-position="bottom center" onclick="editWorkflow(<?= $workflow->id ?>);">
                    <i class="edit icon"></i>
                </a>
                <a class="ui icon" data-tooltip="Move" data-position="bottom center">
                    <i class="move icon"></i>
                </a>
                <a class="ui icon" data-tooltip="Delete" data-position="bottom center">
                    <i class="remove red icon"></i>
                </a>                                                       
            </td>
        </tr> 
        <?php } if (!$v3853890471iterated) { ?>
            <tr>
                <td>No workflows to show...</td>
            </tr> 
        <?php } ?>
    </tbody>
    </table>

    
</div>

<div class="ui tiny modal flow">
    <i class="close icon"></i>
    <div class="header">
        <i class="random icon"></i>New Work Flow
    </div>
    <div class="content">  

        <?= $this->tag->form(['workflow/create', 'id' => 'dataForm', 'class' => 'ui form']) ?>
        
            <?php foreach ($form as $element) { ?>
            
                <?php if (is_a($element, 'Phalcon\Forms\Element\Hidden')) { ?>
                    <?= $element ?>
                <?php } else { ?>
                    <div id="name_div" class="<?= ($this->length($element->getValidators()) > 0 ? 'required' : '') ?> field">
                        <?= $element->label() ?>
                        <?= $element->render() ?>
                        <div class="ui basic red pointing prompt label transition hidden" id="name_alert">Please enter a work flow name</div>
                    </div>
                <?php } ?>
            <?php } ?>

            <div class="ui error message"></div>

            <?= $this->tag->hiddenField(['saveNew', 'id' => 'saveNew']) ?>

            

        </form>
    </div>
    <div class="actions">
        <div class="ui primary button" onclick="saveWorkflow();">Save</div>
        <div class="ui teal button">Save & New</div>
        <div class="ui negative button">Cancel</div>        
    </div>
</div>

<?= $this->tag->javascriptInclude('js/projects_workflows.js') ?>