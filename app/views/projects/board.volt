<h2>{{ project.name }} Board</h2>

{{ stylesheet_link('css/board.css') }}

{{ hidden_field('id', 'id' : 'projectId', 'value' : project.id) }}

<div class="ui active loader"></div>
<div id="boardWrapper" class="ui equal width grid"></div>

{{ alert.getRedirectMessage() }}
{{ javascript_include('js/projects_board.js') }}

  