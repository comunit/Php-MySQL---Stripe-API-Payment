<?php
  require_once('vendor/autoload.php');
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_k6Dzsxr8FGKtQyFQetVmIJBQ');

// sanitize Post array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// create customer in stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// charge customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => 'usd',
  "description" => "Intro to react course",
  "customer" => $customer->id
));

// customer data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

// instantiate Customer
$customer = new Customer();

// add customer to db
$customer->addCustomer($customerData);


// transaction data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// instantiate transaction
$transaction = new Transaction();

// add transaction to db
$transaction->addTransaction($transactionData);

// redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

