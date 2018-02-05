<nav class="ui fixed menu">
    <a href="#" class="header item">
        <img class="logo" src="/openpoc/public/img/logo.png"> OPENPOC PM
    </a>
    {{ elements.getMenu() }}
</nav>

<div class="ui main stackable container">
    {{ flash.output() }}
    {{ content() }}    
    <footer>
        <p>&copy; The OPENPOC Collection 2018</p>
    </footer>
</div>