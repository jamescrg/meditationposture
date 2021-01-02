<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165756037-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-165756037-2');
        </script>

        <meta charset="UTF-8" content="">
	    <title>meditationposture.net</title>
		<link rel="shortcut icon" href="" />
		<link rel="apple-touch-icon" href="" />

        <!-- set viewport for mobile devices -->
		<meta name="viewport" content="width = device-width, initial-scale = 1">

        <!-- bootstrap stylesheet -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- app stylesheets -->
		<link rel="stylesheet" href="/styles/styles.css">

        <!-- bootstrap javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>

    <div class="container"> 

        <div class="row">

            <div class="col-sm-12">
				<div id="title"><a href="/" id="titleLink">meditationposture.net</a></div>
            </div>

        </div>

        <div class="row">

            <div id="content" class="col-sm-10">

                <div class="panel-background">
                    <?php foreach ($views as $view) include($view) ?>
                </div>

            </div>

            <div id="nav" class="col-sm-2">

                <div class="panel-background">
					<?php include 'views/nav.php'; ?>
                </div>

            </div>

    	</div>

    </div>
<br />
<br />
</body>
</html>
