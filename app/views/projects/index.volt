<h2>Projects</h2>

<form id="sortForm" action="projects" method="post">
            
    {{ hidden_field("sortField", "value" : sortField) }}
    {{ hidden_field("sortDirection", "value" : sortDirection) }}    

</form>  

<table class="ui sortable selectable celled striped table">
    <thead>
        <tr>
            <th class="five wide <?php echo $sortField == 'name' ? 'sorted' . ($sortDirection == 'DESC' ? ' descending' : ' ascending') : '' ?>" 
                onclick="sort('name', '<?php echo $sortDirection == 'DESC' ? ($sortField != 'name' ? 'DESC' : 'ASC') : ($sortField != 'name' ? 'ASC' : 'DESC') ?>');">NAME</th>
            <th class="nine wide <?php echo $sortField == 'description' ? 'sorted' . ($sortDirection == 'DESC' ? ' descending' : ' ascending') : '' ?>" 
                onclick="sort('description', '<?php echo $sortDirection == 'DESC' ? ($sortField != 'description' ? 'DESC' : 'ASC') : ($sortField != 'description' ? 'ASC' : 'DESC') ?>');">DESCRIPTION</th>
            <th>Status</th>
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
            No products to show...
        {% endfor %}
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">
                {{ listing.getPagination(page, start, end, totalItems, currentPage) }}                                        
            </th>
        </tr>
    </tfoot>
</table>

{{ javascript_include('js/projects.js') }}