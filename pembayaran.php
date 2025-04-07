require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('your-secret-key-here');

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
