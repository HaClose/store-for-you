<?php

require_once( dirname(__FILE__).'/stripe-php/init.php');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_VhCNshQKyceCbfU5Ds7YuOjr");

// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
$name  = $_POST['stripeName'];

$currency  = $_POST['stripeCurrency'];
$amount;
$plan;
switch ($currency) {
  case "myr":
    $amount = 6000;
    $plan = 'plan_Ga02uj3TdscKUn';
    break;
  case "usd":
    $amount = 1500;
    $plan = 'plan_Ga02GYopMwCa1e';
    break;
  case "sgd":
    $amount = 2000;
    $plan = 'plan_Ga02qaKNdrZlLP';
    break;
}

try {
  $customer = \Stripe\Customer::create(array(
    "source" => $token,
    "email"  => $email,
    "name"   => $name,
  ));

  $customerId = $customer -> id;

  $subscription = \Stripe\Subscription::create(array(
    "customer" => $customerId,
    'items' => [['plan' => $plan]],
    //'trial_end' => time() + 5,
  ));
  /* 
  $charge = \Stripe\Charge::create(array(
    "amount" => $amount,
    "description" => "Subscription Service",
    "currency" => $currency,
    //"source" => $token,
    "customer" => $customerId,
  ));
  */
}catch (\Stripe\Error\Card $e) {
  // 決済失敗時の処理
  die('決済が完了しませんでした');
}

// 決済処理完了後に飛ばすページ
header('Location: /index.html');
exit;

?>