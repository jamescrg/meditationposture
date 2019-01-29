<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8" content="">
	    <title>meditationposture.org </title>
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
				<div id="title">meditationposture.org</div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-10">

                <div class="panel-background">
		    		<?php include 'chapters/' . $chapter . '.php'; ?>
                </div>

            </div>

            <div class="col-sm-2" id="nav">

                <div class="panel-background">
					<?php include 'nav.php'; ?>
                </div>

            </div>

    	</div>

    </div>

</body>
</html>
