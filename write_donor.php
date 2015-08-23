<?php
	$servername = "localhost";
	$username = "donation_edits";
	$password = "donation";
	$dbname = "donationhub";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$first_name = mysql_real_escape_string($_POST['first_name']);
	$last_name = mysql_real_escape_string($_POST['last_name']);
	$email_a = mysql_real_escape_string($_POST['email']);
	$password= sha1(mysql_real_escape_string($_POST['passsword']));
	
	$sql = "INSERT INTO donors (donor_first_name, donor_last_name, donor_email, donor_password) VALUES ('".$first_name."','".$last_name."','".$email_a."','".$password."');";
	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
	} else {
		header('Location: error.php?error='.urlencode($conn->error));
	}
	$last_id=$conn->insert_id;
	//print_r($last_id);
	//print_r($_POST['recipient_type']);
	foreach ($_POST['recipient_type'] as $names)
	{
		//print_r($names);
		$sql= "INSERT INTO donor_interests (donor_id, recipient_type_id) VALUES (".$last_id.",".$names.");";
		//print_r($sql);
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			header('Location: error.php?error='.urlencode($conn->error));
		}	
	}
	$conn->close();
	header('Location: registration_success.php?type=donor');
?>



