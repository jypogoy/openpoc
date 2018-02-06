<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('semantic/semantic.min.css') }}
        {{ stylesheet_link('css/app.css') }}
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body>
        {{ javascript_include('js/jquery-3.3.1.min.js') }}        
        {{ content() }}
        {{ javascript_include('semantic/semantic.min.js') }}
    </body>
</html>

<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css-->
<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js-->
