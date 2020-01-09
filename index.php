
<!-- sign in -->
<?php
	if(isset($_POST["smiley"]))
{  
  $mood = $_POST["smiley"];
  $time = date('Y-m-d H:i:s');
  $why=$_POST["why"];
  $why = mysql_real_escape_string($why);
  include("connect.php");
  $sql = "INSERT INTO `mood_analysis`(`index`, `mood`, `why`, `timestamp`) VALUES ('', '$mood','$why','$time')";
  $result = mysqli_query($link,$sql);
  sleep(2);
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Mood analysis </title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Suez+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
			<div class= "row" id="heading">
				<div class="col-sm-1">
					<img src="images/dell logo.png" id="logo">
				</div>
				<div class="col-sm-11">
					<h1 id="heading">How do you feel today?</h1>
				</div>				
			</div>
			<div class="row" id ="smiley_row">
				<form id="smileys" class="form-horizontal" role="form" method="post" action="">
					<div class="rating">
						<input type="radio" id="smiley" name="smiley" value="sad" class="sad" required onclick="plays1()">
						<input type="radio" id="smiley" name="smiley" value="neutral" class="neutral" onclick="plays2()">
						<input type="radio" id="smiley" name="smiley" value="happy" class="happy" onclick="plays3()">
					</div>
						
		 			<br><br>
					<h2 id="result"></h2>
					<br>
					<div id = "area" class="area" style="display: none;">
						<textarea cols="61" rows="3" name="why" id= "why" class="form-control"></textarea>
					</div>
					<br>
					<button id="submit" class="btn btn-primary" type="submit" value="SUBMIT" name="submit" data-toggle="modal" data-target="#myModal" style="display: none;">  SUBMIT
					</button>
				</form>
			</div>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body">
			        <p>Thanks for the feedback</p>
			      </div>
			    </div>
			  </div>
			</div>
	</div>

</body>
	<script type="text/javascript">
		$('#smileys input').on('click', function() {
			var mood = $(this).val();
			var text
			if (mood == "happy") {
				text ="That's great! Tell us why!"
			}
			else if(mood == "sad"){
				text = "Uh-oh! Please share your feedback."
			}
			else {
				text = "Umm... Please tell us more"
			}
			$('#result').html(text)
			document.getElementById('area').style.display = "block";
			document.getElementById('submit').style.display = "block";
		});
		document.addEventListener('contextmenu', event => event.preventDefault());
		var audio1 = new Audio('audio/sad.mp3');
		var audio2 = new Audio('audio/neutral.mp3');
		var audio3 = new Audio('audio/happy2.mp3');
		function plays1(){
			audio2.pause();
		    audio2.currentTime = 0;
		    audio3.pause();
		    audio3.currentTime = 0;
		    audio1.play();
		}
		function plays2(){
			audio1.pause();
		    audio1.currentTime = 0;
		    audio3.pause();
		    audio3.currentTime = 0;
		    audio2.play();
		}
		function plays3(){
			audio1.pause();
		    audio1.currentTime = 0;
		    audio2.pause();
		    audio2.currentTime = 0;
		    audio3.play();
		}
	</script>
</html>             	