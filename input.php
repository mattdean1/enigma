<?php

?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Input: Plaintext Message</title>
	<link rel="shortcut icon" href="images/favicon.ico"> 
	
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/sticky-footer.css" rel="stylesheet">
	
	<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	</script>
	
</head>
<body>

<div id="wrap">
      <!-- Begin page content -->
		<div class="jumbotron">
			<div class="container">
				<!---headings at the top of the page--->
				    <!---headings at the top of the page--->
			<h2>Enigma Machine</h2>
			<h3></h3>
			</div>
		</div>
		
		<div class="container">
				<div class="row"><br></div>
				<div class="row">


					<form class="form-horizontal" action="trial1.php" method="post">
					
					<div class="form-group">
						<label for="rotor1" class="col-sm-2 control-label">Rotor 1: </label>
							<div class="col-sm-3">
								<select name="rotor1" class="form-control">
								<option value="EKMFLGDQVZNTOWYHXUSPAIBRCJ">I</option>
								<option value="AJDKSIRUXBLHWTMCQGZNPYFVOE">II</option>
								<option value="BDFHJLCPRTXVZNYEIWGAKMUSQO">III</option>
								<option value="ESOVPZJAYQUIRHXLNFTGKDCMWB">IV</option>
								<option value="VZBRGITYUPSDNHLXAWMJQOFECK">V</option>
								</select>
							</div>
					</div>
					
										<div class="form-group">
						<label for="rotor2" class="col-sm-2 control-label">Rotor 2: </label>
							<div class="col-sm-3">
								<select name="rotor2" class="form-control">
								<option value="EKMFLGDQVZNTOWYHXUSPAIBRCJ">I</option>
								<option value="AJDKSIRUXBLHWTMCQGZNPYFVOE">II</option>
								<option value="BDFHJLCPRTXVZNYEIWGAKMUSQO">III</option>
								<option value="ESOVPZJAYQUIRHXLNFTGKDCMWB">IV</option>
								<option value="VZBRGITYUPSDNHLXAWMJQOFECK">V</option>
								</select>
							</div>
						</div>
						
											<div class="form-group">
						<label for="rotor3" class="col-sm-2 control-label">Rotor 2: </label>
							<div class="col-sm-3">
								<select name="rotor3" class="form-control">
								<option value="EKMFLGDQVZNTOWYHXUSPAIBRCJ">I</option>
								<option value="AJDKSIRUXBLHWTMCQGZNPYFVOE">II</option>
								<option value="BDFHJLCPRTXVZNYEIWGAKMUSQO">III</option>
								<option value="ESOVPZJAYQUIRHXLNFTGKDCMWB">IV</option>
								<option value="VZBRGITYUPSDNHLXAWMJQOFECK">V</option>
								</select>
							</div>
						</div>
						
					<div class="form-group">
						<label for="ringstellung" class="col-sm-2 control-label">Rotor Setting: </label>
							<div class="col-sm-3">
								<input type="text" name="ringstellung" class="form-control">
							</div>
						</div>
						
					<div class="form-group">
						<label for="steckerbrett" class="col-sm-2 control-label">Plugboard Settings: </label>
						<?php
						for ($i=1; $i<6; $i++){
						echo '<div class="col-sm-1">';
						echo '<input type="text" name="steckerbrett'.$i.'" class="form-control">';
						echo '</div>';
						}
						echo '<br><br>';
						echo '<div class="col-sm-1 col-lg-offset-2">';
						echo '<input type="text" name="steckerbrett'.$i.'" class="form-control">';
						echo '</div>';
						for ($i=7; $i<11; $i++){
						echo '<div class="col-sm-1">';
						echo '<input type="text" name="steckerbrett'.$i.'" class="form-control">';
						echo '</div>';
						}
						?>
					</div>
						
						<div class="form-group">
						<label for="msg" class="col-sm-2 control-label">Message: </label>
							<div class="col-sm-3">
								<input type="text" name="msg" class="form-control">
							</div>
						</div>
						
						  <div class="form-group">
							<div class="col-sm-offset-4 col-sm-1">
							  <button type="submit" class="btn btn-primary btn-block">Go</button>
							</div>
						  </div>

					</form>
					
				
				
						
				</div>
		</div>
</div>
</div>

	<div id="footer">
      <div class="container">
		<div class="text-center">
        <p><small>&copy;&nbsp; Matt Dean &nbsp;2013/14 </small></p><!---copyright information--->
		</div>
      </div>
    </div>

</body>
</html>
