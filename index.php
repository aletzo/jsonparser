<?php

require_once 'lib/bootstrap.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="page" class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="hero-unit">
                    <h1><a href="" class="brand">JSONparser</a></h1>
                    <p>that parses JSON <small>( hell yeah )</small></p>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="row-fluid">
                <div class="span6"><textarea id="from" name="from" rows="30" placeholder="go ahead, make my day"><?php if ( $_POST ) echo stripslashes( $_POST['from'] ) ?></textarea></div>
                <div class="span6"><textarea readonly="readonly" id="to" name="to" rows="30" placeholder="go ahead, make the left textarea's day"><?php if ( $_POST ) echo stripslashes( $to ) ?></textarea></div>
            </div>
            <div class="row-fluid">
                <div class="span12"><input type="submit" class="btn" id="submit" value="hit me" /></div>
            </div>
        </form>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
