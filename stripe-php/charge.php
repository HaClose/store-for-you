<?php

// 他のライブラリを読み込み
require_once('init.php');

// APIキー登録
$stripe = array(
  "secret_key"      => "sk_test_VhCNshQKyceCbfU5Ds7YuOjr",
  "publishable_key" => "pk_test_3LYqp76Baj0Z7WuetsAQEJFc"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

// Checkput.jsからPOSTされたトークンとメールアドレスを代入
$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];

// 決済額を設定
$price  = '1000';

// 顧客を作成
$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

// チャージを作成
$charge = \Stripe\Charge::create(array(
    'description'  => $product,
    'customer' => $customer->id,
    'amount'   => $price,
    'currency' => 'jpy'
));

// 処理が完了したら完了ページへリダイレクト
header('Location: file:///Users/takashi.iwasaki/store4ufm/index.html');

?>