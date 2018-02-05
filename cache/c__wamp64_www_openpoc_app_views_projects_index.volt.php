<h2>Projects</h2>

<form id="sortForm" action="projects" method="post">
            
    <?= $this->tag->hiddenField(['sortField', 'value' => $sortField]) ?>
    <?= $this->tag->hiddenField(['sortDirection', 'value' => $sortDirection]) ?>    

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
        <?php $v34436267661iterated = false; ?><?php foreach ($page->items as $item) { ?><?php $v34436267661iterated = true; ?>
        <tr>
            <td><?= $item->name ?></td>
            <td><?= $item->description ?></td>
            <td><span class="label label-success">Active</span></td>
        </tr>
        <?php } if (!$v34436267661iterated) { ?>
            No products to show...
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">
                <?= $this->listing->getPagination($page, $start, $end, $totalItems, $currentPage) ?>                                        
            </th>
        </tr>
    </tfoot>
</table>

<?= $this->tag->javascriptInclude('js/projects.js') ?>