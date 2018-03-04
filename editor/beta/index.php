<!DOCTYPE html>
<html>
<head>
    <title>PicBot | Generate unlimited, unique and creative images</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Are you tired or lazy to create unique images? Then PicBot is your new hero. Use PicBot to step up your social media game." name="description">

	<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="imgs/favico.ico" rel="icon" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Roboto|Old+Standard+TT" rel="stylesheet">

    <script src="../js/jscolor.min.js"></script>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/fabric.min.js"></script>
	<script src="./custom.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<style>
		body {
			
		}
		hr {
			color:white;
			background:white;
		}
		button {
		    background-color: #4CAF50; /* Green */
		    border: none;
		    color: white;
		    padding: 5px 15px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin:5px;
		    cursor:default;
		}

		button:hover{
			cursor:pointer;
			background-color: #4CCE40; 
		}
	</style>

</head>
<body>
    <div class="container-fluid" style="">
    	<div class="row">
	        <div class="col-md-3" style="color:white; background:black; padding-top: 30px; padding-bottom:30px; padding-left:30px;">

	        	<div class="row" style="margin-bottom:40px">
					<div class="col-12">
	        			<a href="."><img src="./imgs/picbot.png"></a>
    					<span style="color:white;font-size:25px;">"Hi, I'm Quoter"</span>
    				</div>
				</div>

    			<div class="row">
					<div class="col-12">
						<button onclick="randomize_all();">random</button><br>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-12">
						<button onclick="randomize_textPos();">position</button>
						<button onclick="randomize_fontStyle();">font style</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button onclick="fontsize_plus();">+</button>
						<button onclick="fontsize_minus();">-</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<input class="jscolor" value="ab2567" style="max-width: 100px;">
						<select id="fontsel" name="selector"></select>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<button onclick="randomize_filter();">apply filter</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button onclick="randomize_text();">text</button>
						Query: <input id="query" type="text" style="max-width:100px" placeholder="query..." value="girl">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-12">
						<button onclick="exportimg();">Export</button> 
						<script type="text/javascript" src="https://app.mailerlite.com/data/webforms/406722/q4b5n8.js?v1"></script>
					</div>
				</div>

			</div>
			<div class="col-md-1"></div>
			<div id="canvas-placeholder" class="col-md-8" style="max-width: 100%; max-height: 100%; overflow:auto; min-height: 250px;">
				 <canvas id="canvas" style=" border:3px dotted black; padding: 10px;"></canvas>			 
			</div>
			<div class="col-md-1"></div>
        </div>
 
    </div>
	<div id="footer" style="background:black;">
		<div style="padding:20px;">
			<span style="color:white">2017 &copy; All rights reserved.</span>
		</div>
	</div>

  
	<script>
		$(document).ready(function() { // sticky footer
			var docHeight = $(window).height();
			var footerHeight = $('#footer').height();
			var footerTop = $('#footer').position().top + footerHeight;
			if (footerTop < docHeight) {
				$('#footer').css('margin-top', 0+ (docHeight - footerTop) + 'px');
			}
		});
	 </script>


</body>
</html>


