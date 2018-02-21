<div class="ui segment">
    <a class="ui blue ribbon label"><i class="random icon"></i>WORK FLOW</a>
    <button class="ui right floated icon small primary button" id="btnAddWorkflow" data-tooltip="Add work flow" data-position="bottom center">
        <i class="plus icon"></i>
    </button>
    <p></p>
    <div id="workflowListWrapper">
        <div class="ui active loader"></div>
    </div>
</div>

<div class="ui tiny modal flow">
    <i class="close icon"></i>
    <div class="header">
        <i class="random icon"></i>New Work Flow
    </div>
    <div class="content">  

        {{ form('workflow/create', 'id' : 'dataForm', 'class' : 'ui form') }}
        
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
        <div class="ui primary button" onclick="saveWorkflow(false);">Save</div>
        <div class="ui teal button" onclick="saveWorkflow(true);">Save & New</div>
        <div class="ui negative button">Cancel</div>        
    </div>
</div>

{{ modals.getConfirmation('delete', 'Workflow') }}

{{ javascript_include('js/projects_workflows.js') }}