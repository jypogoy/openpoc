<?= $this->alert->getRedirectMessage() ?>

<h2>Projects</h2>

<form class="ui form" id="listForm" action="projects" method="post">
    <?= $this->tag->hiddenField(['sortField', 'value' => $sortField]) ?>
    <?= $this->tag->hiddenField(['sortDirection', 'value' => $sortDirection]) ?>
    <?= $this->tag->hiddenField(['itemsPerPage', 'value' => $itemsPerPage]) ?>
    <?= $this->tag->hiddenField(['currentPage', 'value' => $currentPage]) ?>
    <div class="ui equal width stackable grid">
        <div class="column">
            <div class="ui action left icon input">
                <i class="search icon"></i>
                <?= $this->tag->textField(['keyword', 'id' => 'fieldKeyword', 'placeholder' => 'Type in keywords...', 'value' => $keyword]) ?>
                <div class="ui teal submit button">Submit</div>
                <!-- <button class="ui button" type="reset" id="resetBtn">Reset</button> -->
            </div>            
        </div>
        <div class="right aligned column">
            <a href="projects/new" class="ui primary button"><i class="plus icon"></i>New Project</a>
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
        <?php $v34436267661iterated = false; ?><?php foreach ($page->items as $item) { ?><?php $v34436267661iterated = true; ?>
        <tr>
            <td><?= $item->name ?></td>
            <td><?= $item->description ?></td>
            <td><span class="label label-success">Active</span></td>
        </tr>
        <?php } if (!$v34436267661iterated) { ?>
            <!--No products to show...ad-->
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">
                <?= $this->listing->getPagination($page, $start, $end, $totalItems, $currentPage, $itemsPerPage) ?>                                        
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

<?= $this->tag->javascriptInclude('js/projects.js') ?>