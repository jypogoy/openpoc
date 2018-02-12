<h2>New Project</h2>

{{ form('projects/create', 'id' : 'dataForm', 'class' : 'ui form') }}

    {% for element in form %}
    
        {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
            {{ element }}
        {% else %}
            <div id="name_div" class="{{ element.getValidators() | length > 0 ? 'required' : '' }} field">
                {{ element.label() }}
                {{ element.render() }}
                <div class="ui basic red pointing prompt label transition hidden" id="name_alert">Please enter a project name</div>
            </div>
        {% endif %}
    {% endfor %}

    {{ submit_button('Save', 'class': 'ui primary button', 'onclick': 'return SaveProject.validate();') }}
    {{ submit_button('Save & New', 'class' : 'ui teal button') }}
    <a href="../projects" class="ui button">Cancel</a>

</form>

{# Validation messages thrown by the system in case not trapped on UI. #}
{% if messages is defined %}
    <div class="ui error message">
        <ul>
            {% for message in messages %}
                <li>{{ message }}</li>
            {% endfor %}
        </ul>
    </div>
{% endif %}    

{{ javascript_include('js/projects_new.1.js') }}