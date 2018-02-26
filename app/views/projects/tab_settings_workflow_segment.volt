<div class="ui segment">
    <a class="ui blue ribbon label"><i class="random icon"></i>WORK FLOW</a>
    <button class="ui right floated icon small primary button" id="btnAddWorkflow" data-tooltip="Add work flow" data-position="bottom center">
        <i class="plus icon"></i>
    </button>
    <p></p>
    <div id="workflowListWrapper">
        <div class="ui active loader"></div>
        <table id="workflowTable" class="ui celled striped table sorted_table">
        <thead class="sorted_head">
            <tr>
                <th width="1%"></th>
                <th class="five wide">NAME</th>
                <th class="nine wide">DESCRIPTION</th>
                <th></th>
            </tr>
        </thead>
        <tbody>                
            {#% for workflow in workflows %}
            <tr>
                <td><i class="ellipsis vertical icon move"></i><i class="ellipsis vertical icon move pair"></i></td>
                <td>{{ workflow.name }}</td>
                <td>{{ workflow.description }}</td>
                <td>
                    <a class="ui icon" data-tooltip="Edit" data-position="bottom center" onclick="editWorkflow({{ workflow.id }});">
                        <i class="edit icon"></i>
                    </a>
                    {<a class="ui icon" data-tooltip="Move" data-position="bottom center">
                        <i class="move icon"></i>
                    </a>}
                    <a class="ui icon" onclick="del('{{ workflow.id }}', '{{ workflow.name }}'); return false;" data-tooltip="Delete" data-position="bottom center">
                        <i class="remove red icon"></i>
                    </a>                                                       
                </td>
            </tr> 
            {% else %}
                <tr>
                    <td colspan="4">No workflows to show...</td>
                </tr> 
            {% endfor %#}
        </tbody>
        </table>
    </div>

    {#<form class="ui form">
        <div class="ui stackable grid">
            <div class="five wide column">
                <input type="text" placeholder="Name..."/>
            </div>
            <div class="nine wide column">
                <input type="text" placeholder="Description..."/>
            </div>
            <div class="column">
                <button class="ui icon primary button" data-tooltip="Add work flow" data-position="bottom center">
                    Add
                </button>
            </div>
        </div>
    </form>#}
</div>

<div class="ui tiny modal flow">
    <i class="close icon"></i>
    <div class="header">
        <i class="random icon"></i>New Work Flow
    </div>
    <div class="content">  

        {{ form('', 'id' : 'dataForm_Workflow', 'class' : 'ui form', 'autocomplete' : 'off') }}
       
            {% for element in form %}
                
                {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
                    {{ element }}           
                {% else %}
                    <div id="{{ element.getName() }}_div" class="{{ element.getValidators() | length > 0 ? 'required' : '' }} field">
                        {{ element.label() }}
                        {{ element.render() }}
                        <div class="ui basic red pointing prompt label transition hidden" id="name_alert">Please enter a work flow name</div>
                    </div>
                {% endif %}
            {% endfor %}

            <div class="ui error message"></div>
            
            {{ hidden_field('saveNew', 'id' : 'saveNew') }}

            {#{ submit_button('Save', 'class': 'ui primary button', 'onclick': 'return Save.validate(0);') }}
            {{ submit_button('Save & New', 'class' : 'ui teal button', 'onclick': 'return Save.validate(1);') }#}
            
        </form>
    </div>
    <div class="actions">
        <div id="editActions">
            <div class="ui primary button" onclick="saveWorkflow(false);">Save changes</div>
            <div class="ui negative button">Cancel</div>        
        </div>
        <div id="newActions">
            <div class="ui primary button" onclick="saveWorkflow(false);">Save</div>
            <div class="ui teal button" onclick="saveWorkflow(true);">Save & New</div>
            <div class="ui negative button">Cancel</div>        
        </div>    
    </div>
</div>

{{ modals.getConfirmation('delete', 'Workflow') }}

{{ javascript_include('js/projects_workflows_ajax.js') }}