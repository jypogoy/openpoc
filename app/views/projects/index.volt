<h2>Projects</h2>

<form class="ui form" id="listForm" action="projects" method="post">
    {{ hidden_field("sortField", "value" : sortField) }}
    {{ hidden_field("sortDirection", "value" : sortDirection) }}
    {{ hidden_field("itemsPerPage", "value" : itemsPerPage) }}
    {{ hidden_field("currentPage", "value" : currentPage) }}
    <div class="ui equal width stackable grid">
        <div class="column">
            <div class="ui action left icon input">
                <i class="search icon"></i>
                {{ text_field("keyword", "id" : "fieldKeyword", "placeholder" : "Type in keywords...", "value" : keyword) }}
                <div class="ui teal submit button">Submit</div>
                <!-- <button class="ui button" type="reset" id="resetBtn">Reset</button> -->
            </div>            
        </div>
        <div class="right aligned column">
            <a href="new" class="ui primary button"><i class="plus icon"></i>New Project</a>
        </div>
    </div>     
</form>  

<table class="ui sortable selectable celled striped table">
    <thead>
        <tr>
            <th class="five wide <?php echo $sortField == 'name' ? 'sorted' . ($sortDirection == 'DESC' ? ' descending' : ' ascending') : '' ?>" 
                onclick="sort('name', '<?php echo $sortDirection == 'DESC' ? ($sortField != 'name' ? 'DESC' : 'ASC') : ($sortField != 'name' ? 'ASC' : 'DESC') ?>');">NAME</th>
            <th class="nine wide <?php echo $sortField == 'description' ? 'sorted' . ($sortDirection == 'DESC' ? ' descending' : ' ascending') : '' ?>" 
                onclick="sort('description', '<?php echo $sortDirection == 'DESC' ? ($sortField != 'description' ? 'DESC' : 'ASC') : ($sortField != 'description' ? 'ASC' : 'DESC') ?>');">DESCRIPTION</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        {% for item in page.items %}
        <tr>
            <td>{{ item.name }}</td>
            <td>{{ item.description }}</td>
            <td><span class="label label-success">Active</span></td>
        </tr>
        {% else %}
            <!--No products to show...ad-->
        {% endfor %}
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">
                {{ listing.getPagination(page, start, end, totalItems, currentPage, itemsPerPage) }}                                        
            </th>
        </tr>
    </tfoot>
</table>

<div class="ui tiny modal delete">
    <i class="close icon"></i>
    <div class="header">
        <i class="trash outline icon"></i> Delete Project
    </div>
    <div class="content custom-text" style="min-height: 30px;">        
    </div>
    <div class="actions">
        <div class="ui negative button">Cancel</div>
        <div class="ui positive button">OK</div>
    </div>
</div>

<div class="ui active loader"></div>

{{ javascript_include('js/projects.js') }}