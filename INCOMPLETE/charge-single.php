<?php     
    require_once("./lib/Simplify.php");
 
    Simplify::$publicKey = 'sbpb_YmFhN2JmZTMtZDBkZi00MzA5LWI5M2EtYTBjNjlkNTE3ZTVm';
    Simplify::$privateKey = 'Eu/MTPwWMsL97YuJ5XCI8oIW0Sl7uGskdUbY4VXsWsx5YFFQL0ODSXAOkNtXTToq';
     
    $payment = Simplify_Payment::createPayment(array(
            'amount' => floatval($_POST["amount"])*100,
            'token' => $_POST["simplifyToken"],
            'description' => 'One-time Single Donation',
            'reference' => '7a6ef6be31',
            'currency' => 'USD'
    ));
     
    if ($payment->paymentStatus == 'APPROVED') {
        echo "Payment approved\n";
    }     
	echo $_GET["simplifyToken"];
?>

