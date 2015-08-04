<?php
    require_once __DIR__."/../vendor/autoload.php";
    $app = new Silex\Application();

    $app->get("/", function() {
        return
        "<!DOCTYPE html>
        <html>
        <head>
            <title>Hello Friend!</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        </head>
        <body>
            <div class='container'>
                <h1>Hello from Afar</h1>
                <p>Dear Friend,</p>
                <p>How are you? I hope that you are having a nice weekend. I'm vacationingin the mountains of Tibet while I learn programming!</p>
                <p>Friend, you would not blah blah blah blah blah blah</p>
                <p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>
                <p>blah blah blah blah</p>
                <p>Cheers</p>
                <p>Your friend</p>
                <a href= '/goodbye'>Goodbye</a>
            </div>
        </body>
        </html>"
        ;
    });

    $app->get("/goodbye", function() {
        return "Goodbye Friend!";
    });
    return $app;
?>
