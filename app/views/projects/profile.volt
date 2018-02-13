{{ alert.getRedirectMessage() }}

<h2>Project {{ project.name }}</h2>

<div class="ui top attached tabular menu">
    <a class="active item" data-tab="1st"><h4><i class="shopping basket icon"></i>Requirements</h4></a>
    <a class="item" data-tab="2nd"><h4><i class="alarm outline icon"></i>Risks</h4></a>
    <a class="item" data-tab="3rd"><h4><i class="rocket icon"></i>Activities</h4></a>
    <a class="item" data-tab="4th"><h4><i class="address card outline icon"></i>Resources</h4></a>
    <a class="item" data-tab="5th"><h4><i class="calendar icon"></i>Timeline</h4></a>
    <a class="item" data-tab="6th"><h4><i class="settings icon"></i>Settings</h4></a>
</div>
<div class="ui bottom attached active tab segment" data-tab="1st">
  Res
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

{{ javascript_include('js/projects_profile.js') }}