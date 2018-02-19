<?= $this->alert->getRedirectMessage() ?>

<h2>Project <?= $project->name ?></h2>

<div class="ui top attached tabular menu">
    <a class="active item" data-tab="1st"><h4><i class="snowflake icon"></i>Project Plan</h4></a>
    <a class="item" data-tab="2nd"><h4><i class="checkmark icon"></i>Assessment</h4></a>
    <a class="item" data-tab="3rd"><h4><i class="alarm outline icon"></i>Risks</h4></a>
    <a class="item" data-tab="4th"><h4><i class="tasks icon"></i>Activities</h4></a>
    <a class="item" data-tab="5th"><h4><i class="address card outline icon"></i>Resources</h4></a>
    <a class="item" data-tab="6th"><h4><i class="calendar icon"></i>Timeline</h4></a>
    <a class="item" data-tab="7th"><h4><i class="settings icon"></i>Settings</h4></a>
</div>
<div class="ui bottom attached active tab segment" data-tab="1st">
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
    <div class="ui segment">
    <a class="ui blue ribbon label"><i class="tag icon"></i>TAGS</a>
    <button class="ui right floated icon small primary button" id="btnAddTag" data-tooltip="Add tag" data-position="bottom center">
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
        <tr>
            <td>1</td>
            <td>2</td>
            <td>
                <a class="ui icon" data-tooltip="Edit" data-position="bottom center">
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
    </tbody>
    </table>
</div>

<div class="ui tiny modal tag">
    <i class="close icon"></i>
    <div class="header">
        <i class="tag icon"></i>New Tag
    </div>
    <div class="content">  
        <form class="ui form">
            <div class="field">
                <label>Name</label>
                <input type="text" name="flowName">
            </div>
            <div class="field">
                <label>Description</label>
                <textarea name="flowDescription"></textarea>
            </div>         
        </form>
    </div>
    <div class="actions">
        <div class="ui primary button">Save</div>
        <div class="ui teal button">Save & New</div>
        <div class="ui negative button">Cancel</div>        
    </div>
</div>
    <div class="ui segment">
    <a class="ui blue ribbon label"><i class="toggle on icon"></i>COLORS</a>
    <button class="ui right floated icon small primary button" id="btnAddColor" data-tooltip="Add color" data-position="bottom center">
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
        <tr>
            <td>1</td>
            <td>2</td>
            <td>
                <a class="ui icon" data-tooltip="Edit" data-position="bottom center">
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
    </tbody>
    </table>
</div>

<div class="ui tiny modal color">
    <i class="close icon"></i>
    <div class="header">
        <i class="toggle on icon"></i>New Color
    </div>
    <div class="content">  
        <form class="ui form">
            <div class="field">
                <label>Name</label>
                <input type="text" name="flowName">
            </div>
            <div class="field">
                <label>Description</label>
                <textarea name="flowDescription"></textarea>
            </div>         
        </form>
    </div>
    <div class="actions">
        <div class="ui primary button">Save</div>
        <div class="ui teal button">Save & New</div>
        <div class="ui negative button">Cancel</div>        
    </div>
</div>
</div>
<div class="ui bottom attached tab segment" data-tab="2nd">
  Second
</div>
<div class="ui bottom attached tab segment" data-tab="3rd">
  Third
</div>
<div class="ui bottom attached tab segment" data-tab="4th">
  Third
</div>
<div class="ui bottom attached tab segment" data-tab="5th">
  Third
</div>
<div class="ui bottom attached tab segment" data-tab="6th">
  Third
</div>
<div class="ui bottom attached tab segment" data-tab="7th">
    66454
</div>

<?= $this->tag->javascriptInclude('js/projects_profile.js') ?>