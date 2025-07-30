<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email dal Portfolio</title>
        <style>
            p{ margin-bottom : 10px; }
        </style>
    </head>
    <body>
        <p> Messaggio da {{ $sender }}</p>
        <p>{{ $text }}</p>
    </body>
</html>
