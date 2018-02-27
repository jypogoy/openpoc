<h2>{{ project.name }} Settings</h2>

{{ hidden_field('id', 'id' : 'projectId', 'value' : project.id) }}

{% include 'projects/tab_settings_workflow_segment.volt' %} 
{% include 'projects/tab_settings_tags.volt' %}
{% include 'projects/tab_settings_colors.volt' %}

{{ alert.getRedirectMessage() }}