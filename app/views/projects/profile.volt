{{ alert.getRedirectMessage() }}

<h2>Project {{ project.name }}</h2>
{{ hidden_field('id', 'id' : 'projectId', 'value' : project.id) }}

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
    {% include 'projects/tab_settings_workflow_segment.volt' %}    
    {% include 'projects/tab_settings_tags.volt' %}
    {% include 'projects/tab_settings_colors.volt' %}
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

{{ javascript_include('js/projects_profile.js') }}