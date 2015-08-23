<?php
    require_once("./lib/Simplify.php");
     
    Simplify::$publicKey = 'sbpb_YmFhN2JmZTMtZDBkZi00MzA5LWI5M2EtYTBjNjlkNTE3ZTVm';
    Simplify::$privateKey = 'Eu/MTPwWMsL97YuJ5XCI8oIW0Sl7uGskdUbY4VXsWsx5YFFQL0ODSXAOkNtXTToq';
     
    $plan = Simplify_Plan::createPlan(array(
            'amount' => '1000',
            'renewalReminderLeadDays' => '7',
            'name' => 'plan2',
            'billingCycle' => 'FIXED',
            'frequency' => 'WEEKLY',
            'billingCycleLimit' => '4',
            'frequencyPeriod' => '2'
    ));
     
    print_r($plan);
     
	print_r($plan->id); 
    ?>

