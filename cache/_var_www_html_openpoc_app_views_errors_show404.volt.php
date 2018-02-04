
<?= $this->getContent() ?>

<div class="ui segment">
    <div class="ui huge header">Page not found</div>
    <p>Sorry, you have accessed a page that does not exist or was moved</p>
    <p><?= $this->tag->linkTo(['', 'Home', 'class' => 'ui primary button']) ?></p>
</div>
