<?php
		//set out alphabet and rotors as string
		//rotor values are not used, just here for info
//$rotorI = 		"EKMFLGDQVZNTOWYHXUSPAIBRCJ";
//$rotorII = 		"AJDKSIRUXBLHWTMCQGZNPYFVOE";
//$rotorIII = 		"BDFHJLCPRTXVZNYEIWGAKMUSQO";
//$rotorIV = "ESOVPZJAYQUIRHXLNFTGKDCMWB";
//$rotorV = "VZBRGITYUPSDNHLXAWMJQOFECK";
	
$alpha ="ABCDEFGHIJKLMNOPQRSTUVWXYZ";		//define alphabet string
$reflector1 ="YRUHQSLDPXNGOKMIEBFZCWVJAT";	//define reflector string
		
		//get post variables from input.php
$postmsg = $_POST['msg'];
$rotsetting = $_POST['ringstellung'];
$rotor1 = $_POST['rotor1'];
$rotor2 = $_POST['rotor2'];
$rotor3 = $_POST['rotor3'];

$steckerbrett = array();
for ($i=1; $i<11; $i++){
	array_push($steckerbrett, $_POST['steckerbrett'.$i.'']);
	}

	

		//passes the given letter through the given rotor
function pass1($letter, $rotor) {
				global $alpha;
				return strtr($letter, $alpha, $rotor);
		}

		//mirrors pass1 (opposite direction)
function pass2($letter, $rotor) {
				global $alpha;
				return strtr($letter, $rotor, $alpha);
		}

		//rotates the given rotor by one character
function rotate(&$rotor){		
	//'&' gives permission for function to change the value of its parameter
		$last = substr($rotor, -1);
		$rotor = substr_replace($rotor, "", -1);
		$rotor = $last . $rotor;
		//return $rotor;
		}
		
		//converts the given number 1-26 to alphabet A-Z
function num2alpha($num, $uppercase = TRUE){
	$num -= 1;
	
	$letter = 	chr(($num % 26) + 97);
	$letter .= 	(floor($num/26) > 0) ? str_repeat($letter, floor($num/26)) : '';
	return 		($uppercase ? strtoupper($letter) : $letter); 
	}

		//gets the paired plug to map each letter to (if any)
function steckerbrett($letter){
		global $steckerbrett;
		$board = $steckerbrett;
		foreach($board as $plug){
					if (strpos($plug, $letter) !== false){
					$pair = $plug;
					$pair = str_replace($letter, "", $pair);
					return $pair;
					}
					else{
					$pair = '';
					}
		}
		return $pair;
}
				
		//convert message passed as string to array where each element is one character
$msg = str_split($postmsg);

		//convert the input rotor setting to letters
$rotsetting = str_split($rotsetting, 2);
	$rset1 = intval($rotsetting[0]);
	$rset2 = intval($rotsetting[1]);
	$rset3 = intval($rotsetting[2]);

	$rset1 = num2alpha($rset1);
	$rset2 = num2alpha($rset2);
	$rset3 = num2alpha($rset3);
	
		// turn rotors to their starting positions
while(substr($rotor1, -1, 1) != $rset1){
	rotate($rotor1);
}
while(substr($rotor2, -1, 1) != $rset2){
	rotate($rotor2);
}
while(substr($rotor3, -1, 1) != $rset3){
	rotate($rotor3);
}

	
	

?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Output: Encrypted Message</title>
	<link rel="shortcut icon" href="images/favicon.ico"> 
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/sticky-footer.css" rel="stylesheet">
  <script language="javascript" type="text/javascript">
  
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

				<strong>Encrypted/Decrypted Message:</strong> &nbsp&nbsp&nbsp
				
				<?php 		
				$i = 0;		 //counts for middle rotor (2) - 0 means rotor 1 is in its start position
				$j = 0; 		//counts for last rotor (3) - 0 means rotor 2 is in its start position
				
					//encrypt each letter of the message (everything inside foreach):
				foreach($msg as $value){
						
						//run through the plugboard the first time
				$pair = steckerbrett($value);
				if($pair !== ''){
				$value = $pair;
				}
				
				rotate($rotor1);  //rotate the first rotor on keypress (before letter is encrypted)
						
						//if the first rotor has been rotated 26 times (back to starting position), rotate the second
					if($i=26){
						rotate($rotor2);
						$i=0;
						$j++; 		//add one to the counter for the last rotor
					}
						//if the second rotor has been rotated 26 times, rotate the third
					if($j=26){
						rotate($rotor3);
						$j=0;		//set counter to 0 (rotor 2 is back in its start position)
							//no counter since no other rotors depend on this one
					}
				
				
					//first pass through rotors
				$value = pass1($value,$rotor1);
				$value = pass1($value,$rotor2);
				$value = pass1($value,$rotor3);
					//signal is reflected
				$value = pass1($value,$reflector1);
					//second pass through rotors (opposite direction)
				$value = pass2($value, $rotor3);
				$value = pass2($value, $rotor2);
				$value = pass2($value, $rotor1);
				
					//run through the plugboard for the second time
					// [[ could make this (plugboard passthrough) into a function 
					//	  but since it's so short and only used twice I decided not to]] 
				$pair = steckerbrett($value);
				if($pair !== ''){
				$value = $pair;
				}
				
				
					//display the encrypted letter
				echo $value;
					//increment counter for second rotor
				$i++;
				}
				//end encryption of letter and return to start 
				//of foreach loop for the next letter
				
				?>
				<br>
				<div id="display"> </div>
				<br>
			
				<div>
			<a class="btn btn-default" href="input.php" role="button">Enter a new Message</a>		
				</div>
				
				<?php 
					///ECHO
				?>
		</div>
</div>
</div>

	<div id="footer">
      <div class="container">
		<div class="text-center">
        <p><small>&copy;&nbsp; Matt Dean &nbsp;2013/14 </small></p>
		</div>
      </div>
    </div>

</body>
</html>
