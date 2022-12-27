<h1>Helloword</h1>
<?php
    echo(date('y-M-d H:i:s'));
    echo("<br>");
    echo(env("APP_KEY"));
    echo("<br>");
    echo(config("app.timezone"));
    echo("<br>");
    if(env("APP_ENV")!="production"){
        echo("day la moi truong test");
    }
    else{
        echo("day la moi truong product");
    }
?>