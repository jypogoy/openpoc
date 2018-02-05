<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('semantic/semantic.min.css') ?>
        <?= $this->tag->stylesheetLink('css/app.css') ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
    </head>
    <body>
        <?= $this->getContent() ?>
        <?= $this->tag->javascriptInclude('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js') ?>
        <?= $this->tag->javascriptInclude('semantic/semantic.min.js') ?>
    </body>
</html>

<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css-->
<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js-->
