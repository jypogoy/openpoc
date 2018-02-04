<nav class="ui fixed menu">
    <a href="#" class="header item">
        <img class="logo" src="img/logo.png"> OPENPOC
    </a>
    {{ elements.getMenu() }}
</nav>

<div class="ui main text container">
    {{ flash.output() }}
    {{ content() }}
    <hr>
    <footer>
        <p>&copy; Company 2017</p>
    </footer>
</div>
