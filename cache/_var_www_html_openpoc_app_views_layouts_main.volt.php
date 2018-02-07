<nav class="ui fixed menu">
    <a href="#" class="header item">
        <img class="logo" src="/openpoc/public/img/logo.png"> OPENPOC PM
    </a>
    <?= $this->elements->getMenu() ?>
</nav>

<div class="ui main stackable container">
    <?= $this->flash->output() ?>
    <?= $this->getContent() ?>    
    <footer>
        <p>&copy; The OPENPOC Collection 2018</p>
    </footer>
</div>