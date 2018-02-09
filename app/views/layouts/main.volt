<nav class="ui fixed menu">
    <a href="#" class="header item">
        <img class="logo" src="/openpoc/public/img/logo.png"> OPENPOC PM
    </a>
    {{ elements.getMenu() }}
</nav>

<div class="ui main stackable container">
    {{ flash.output() }}
    {{ content() }}    
    <div class="footer text-muted"><p>&copy; The OPENPOC Collection. Copyright 2018, All rights reserved.</p></div>
</div>