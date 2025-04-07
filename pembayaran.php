require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('pk_test_51RBBrdKvKswXg6Dp0H93UhwAcZ1CQ1zmRsd2puagBK75r3XiEC1STVa0Qms9AicBpVmMfp2CivkJPaH0Awn3iZMR00BVN0ka6A');

$token = $_POST['stripeToken'];

try {
    $charge = \Stripe\Charge::create([
        'amount' => 5000, // Amount in cents
        'currency' => 'usd',
        'description' => 'Test Charge',
        'source' => $token,
    ]);
    echo 'Payment Successful!';
} catch (\Stripe\Exception\CardException $e) {
    echo 'Payment Failed: ' . $e->getError()->message;
}
