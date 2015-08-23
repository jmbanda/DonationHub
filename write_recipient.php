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
	$display_name = mysql_real_escape_string($_POST['display_name']);
	$email_a = mysql_real_escape_string($_POST['email']);
	$password= sha1(mysql_real_escape_string($_POST['passsword1']));
	$bank_account = mysql_real_escape_string($_POST['bank_account']);
	$bank_routing = mysql_real_escape_string($_POST['bank_routing']);
	$bank_name = mysql_real_escape_string($_POST['bank_name']);
	$cause_url = mysql_real_escape_string($_POST['cause_url']);
	
	
	
	$sql = "INSERT INTO recipients (recipient_first_name, recipient_last_name, recipient_email, recipient_password,recipient_url, recipient_account, recipient_bank_name, recipient_bank_routing,recipient_description) VALUES ('".$first_name."','".$last_name."','".$email_a."','".$password."','".$cause_url."','".$bank_account."','".$bank_name."','".$bank_routing."','".$display_name."');";
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
		$sql= "INSERT INTO recipients_types (recipient_id, recipient_type_id) VALUES (".$last_id.",".$names.");";
		//print_r($sql);
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			header('Location: error.php?error='.urlencode($conn->error));
		}	
	}
	$conn->close();
	header('Location: registration_success.php?type=recipient');
?>



