<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title> FormAssignment </title>
	<link  rel="stylesheet" type="text/css" href="css/style.css">   </link>
</head>

<body>

<div id="logo"> <img src="realestatelogoideas04.jpg"> </div>


<!-- ************************************************************************************************ -->

<?php
//****************************************************************************************************
//Gather data from form submission
//****************************************************************************************************

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$eMail = $_POST['eMail'];
$cityName = $_POST['cityName'];
//$birthYear = $_POST['birthYear'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$filename = $DOCUMENT_ROOT.'formlist.txt';


$fp = fopen($filename, 'a'); //opens the file for writing

$output_line = $lastName.'|'.$firstName.'|'.$eMail.'|'.$cityName.'|'."\n";

fwrite($fp, $output_line);
fclose($fp);

//print "<h4> $lastName, $firstName Added to File</h4>";


?>

<table border ='1'>

<tr>
	<th>Last Name</th>
	<th>First Name</th>
	<th>eMail</th>
	<th>City</th>
	</tr>

<?php
$display = "";  //empty string
$line_ctr = 0;

$fp = fopen($filename, 'r');

while(true)
{
	$line = fgets($fp);

	if (feof($fp))
	{
		break;
	}

	$line_ctr++;

	$line_ctr_remainder = $line_ctr % 2;

	if ($line_ctr_remainder == 0)
	{
		$style = "style='background-color: #FFFFCC;'";
	} else {
		$style = "style='background-color: white; '";
	}

list($lastName, $firstName, $eMail, $cityName) = explode('|', $line);

$display .= "<tr $style>";
	$display .= "<td>".$lastName."</td>";
	$display .= "<td>".$firstName."</td>";
	$display .= "<td>".$eMail."</td>";
	$display .= "<td>".$cityName."</td>";
$display .= "</tr>\n";  //addes newline

}
fclose($fp);

//print $display;  //This prints the table rows

?>
</table>

<div id="form1">

<?php


	$firstName =  $_POST['firstName'];
	//print "<p>Name: $firstName</p>";

	$lastName =  $_POST['lastName'];
	//print "<p>Congratulations $lastName</p>";

	$fullName = $firstName. " " .$lastName;
	print "<p>Name: $fullName</p>";

	$eMail =  $_POST['eMail'];
	print "<p>Email:  $eMail</p>";

	$birthYear =  $_POST['birthYear'];
	//print "<p>Birth Year:  $birthYear</p>";

	$cityName = $_POST['cityName'];
	print "<p>City: $cityName</p>";
	
	$current_year = date('Y');
	//$age = $birthYear - $current_year;
	//intval(($age) = $current_year - $birthYear);
	$age = $current_year - intval($birthYear);

/* =============Start of age Condition====================== */
	if($age <= 15)
	{
		//print "Section child: $age";
		print "Section: Child";
	}
	elseif($age >= 16 && $age <= 54 )
	{
		//print "Section old man: $age";
		print "Section: Adult";

	} else {
		//print "Section senior: $age";
		print "Section: Senior";
	}
	print "<br />";
	print "<br />";
/* =============End of age Condition====================== */


/* =============Start of Validation====================== */
if(empty($firstName)==True || empty($lastName)==True || empty($eMail)==True || empty($birthYear)==True || !is_numeric($birthYear)==True || ($length_of_year) != 4 || $cityName == '-'){
	if (empty($firstName))
	{
		print "Error: You must enter a First Name";
		print "<br />";
		//print "</body></html>";
		
	}
	if (empty($lastName))
	{
		//echo '<script>alert("Error: You must enter a Last Name") </script>';
		print("Error: You must enter a Last Name");
		print "<br />";
		//print "</body></html>";	
	}
	if (empty($eMail))
	{
		print "Error: You must enter your Email";
		print "<br />";
		//print "</body></html>";	
	}
	if (empty($birthYear))
	{
		print "Error: You must enter your Birth Year";
		print "<br />";
		//print "</body></html>";	
	}
	if (!is_numeric($birthYear))
	{
		//print "Error: You must enter a numeric number '".$birthYear."'";
		print "Error: You must enter a numeric number";
		print "<br />";
		//print "</body></html>";	
	}
	/* ticky length_of_year strlength variable conversion */
		$length_of_year = strlen($birthYear);

	if ($length_of_year != 4)
	{
		print "Error: Your Birth Year must be exaclty four numbers '".$birthYear."'";
			//print "<br />Go BACK and try again";
			//print "<br />";
			
		print "</body></html>";
		print "<br />";
			//print "<br />Go BACK and try again";
			//exit;
	}

	if ($cityName == "-")
	{
		print "Error: You must select a City ";
		print "<br />";
			//print "</body></html>";
		
	}
	if((empty($firstName)==False) && empty($lastName)==False && empty($eMail)==False && empty($birthYear)==False && !is_numeric($birthYear)==False && ($length_of_year) == 4 && $cityName != '-')
	{
		//print "<br />Go BACK and try again";
			//exit;
	}
//******************************************************************************************
//Thank you for registering or go back and try again NEW CONDITION
//******************************************************************************************

if(empty($firstName)==False && empty($lastName)==False && empty($eMail)==False && empty($birthYear)==False && !is_numeric($birthYear)==False && ($length_of_year) == 4 && $cityName != '-')

{
	print "Thank You for Registering! <br /><br />";
} else {
	print $birthYear;
	print "<br />Go BACK and try again...  <br /><br />";
}
}
/* =============End of Validation=================== */

//print "<br />";		

?>

<!-- For Admin Use Only: <span style="text-decoration: underline; color: blue;"><a href="assignment_3_add_patron.php"> View Patrons</a></span> -->
For Admin Use Only: <span style="text-decoration: underline; color: blue;"> <a href="display_table.php"> View Patrons</a></span>
</div>

</body>
</html>

