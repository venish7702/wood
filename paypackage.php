<style>
.razorpay-payment-button {
    padding: 4px;
    background-color: #5A9E6F;
    color: #fff;
    border: 0;
}
</style>
<?php

require 'config.php';
require 'razorpay-php/Razorpay.php';


// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//

// $orderid=$_SESSION["OrderID"];
// $firstname=$_SESSION["fname"];
// $lastname=$_SESSION["lname"];
// $email=$_SESSION["email"];
// $contact=$_SESSION["contact"];
// $address=$_SESSION['address'];
// $total=$_SESSION["total"];
// $title=$_SESSION["description"];

$webtitle='wood depot';
$displayCurrency="INR";
$imageurl='./imgae/D Rose.png';



// $price = $_POST['price'];
// $customer = $_POST['customername'];
// $email = $_POST['email'];/
// $contact = $_POST['phone'];

// $_SESSION['email'] = $email;
// $_SESSION['price'] = $price;

$orderData = [
    'receipt' => 3456,
    'amount' => 90 * 100, // 2000 rupees in paise
    'currency' => 'INR',
    'payment_capture' => 1, // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key" => $keyId,
    "amount" => '90000',
    "name" => "$webtitle",
    "description" => "cghddbhdhdgh",
    "image" => "$imageurl",
    "prefill" => [
        "name" =>'krupali',
        "email" => 'krupali@gmail.com',
        "contact" => '9925418223',
    ],
    "notes" => [
        "address" => "ddfdfedefeefde",
        "merchant_order_id" => "12312321",
    ],
    "theme" => [
        "color" => "#F37254",
    ],
    "order_id" => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency'] = $displayCurrency;
    $data['display_amount'] = $displayAmount;
}

$json = json_encode($data);

?>
<form action="verify.php" method="POST">



    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $data['key'] ?>"
        data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>"
        data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>"
        data-prefill.name="<?php echo $data['prefill']['name'] ?>"
        data-prefill.email="<?php echo $data['prefill']['email'] ?>"
        data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
         data-notes.shopping_order_id="<?php  echo $orderid ?>"
        data-order_id="<?php echo $data['order_id'] ?>" 
        <?php if ($displayCurrency !== 'INR') {?>
        data-display_amount="<?php echo $data['display_amount'] ?>" <?php }?> <?php if ($displayCurrency !== 'INR') {?>
        data-display_currency="<?php echo $data['display_currency'] ?>" <?php }?>>
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="<?php  echo $orderid ?>">
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- <script>
$(window).on('load', function() {
    jQuery('.razorpay-payment-button').click();
});
</script> -->


