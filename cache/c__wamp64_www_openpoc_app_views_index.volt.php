<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?= $this->url->get('img/favicon.ico') ?>"/>
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('semantic/semantic.min.css') ?>
        <?= $this->tag->stylesheetLink('css/app.css') ?>
        
        <!-- Snackbar -->
        

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body>
        <?= $this->tag->javascriptInclude('js/jquery-3.3.1.min.js') ?>        
        <?= $this->getContent() ?>
        <?= $this->tag->javascriptInclude('semantic/semantic.min.js') ?>
        
        <?= $this->tag->javascriptInclude('js/message.js') ?>
        <?= $this->tag->javascriptInclude('js/form.js') ?>
        <?= $this->tag->javascriptInclude('js/register.js') ?>
    </body>
</html>

<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css-->
<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js-->
