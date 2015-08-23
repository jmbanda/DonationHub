<?php

require_once("./lib/Simplify.php");
Simplify::$publicKey = 'sbpb_YmFhN2JmZTMtZDBkZi00MzA5LWI5M2EtYTBjNjlkNTE3ZTVm';
Simplify::$privateKey = 'Eu/MTPwWMsL97YuJ5XCI8oIW0Sl7uGskdUbY4VXsWsx5YFFQL0ODSXAOkNtXTToq';
 
    $plan = Simplify_Plan::createPlan(array(
            'amount' => '1100',
            'renewalReminderLeadDays' => '7',
            'name' => 'TESTING',
            'billingCycle' => 'FIXED',
            'frequency' => 'WEEKLY',
            'billingCycleLimit' => '4',
            'frequencyPeriod' => '1'
    )); 
 
$customer = Simplify_Customer::createCustomer(array(
        'subscriptions' => array(
           array(
              'plan' => $plan->id
           )
        ),
        'email' => 'customer@mastercard.com',
        'name' => 'Testing Testing',
        'card' => array(
           'expMonth' => '11',
           'expYear' => '19',
           'cvc' => '123',
           'number' => '5555555555554444'
        ),
        'reference' => 'Testing 1'
));
 
print_r($customer);
 
?>