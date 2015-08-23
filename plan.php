<?php
     
    require_once("./lib/Simplify.php");
     
    Simplify::$publicKey = 'sbpb_YmFhN2JmZTMtZDBkZi00MzA5LWI5M2EtYTBjNjlkNTE3ZTVm';
    Simplify::$privateKey = 'Eu/MTPwWMsL97YuJ5XCI8oIW0Sl7uGskdUbY4VXsWsx5YFFQL0ODSXAOkNtXTToq';    
	 
    $customer = Simplify_Customer::createCustomer(array(
            'subscriptions' => array(
               array(
                  'plan' => '[PLAN ID]'
               )
            ),
            'email' => 'customer@mastercard.com',
            'name' => 'Customer Customer',
            'card' => array(
               'expMonth' => '11',
               'expYear' => '19',
               'cvc' => '123',
               'number' => '5555555555554444'
            ),
            'reference' => 'Ref1'
    ));
     
    print_r($customer);
?>
