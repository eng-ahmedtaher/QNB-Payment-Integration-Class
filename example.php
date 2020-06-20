<?php
    require 'vendor/autoload.php';

    use Payment\QNBPayment;

    echo "This is Payment Page with QNB <br />";

    // Create Session for Payment
    $sessionID = QNBPayment::createSessionSandBox('125550', 'TESTQNBAATEST001', '9c6a123857f1ea50830fa023ad8c8d1b');

    // Start Payment via MasterCard or Visa
    echo QNBPayment::createPaymentSandBox('success.php', 'fail.php', 'TESTQNBAATEST001', '125550', 20.00, $sessionID, 'Test QNB', 'Cairo', 'ahmedtaherinfo0@gmail.com', '0123456789', 'https://yourdomian.com/images/logo.png');

    // Get Order Details in SandBox
    echo "<pre>";
    print_r(QNBPayment::getOrderDetailsSandBox('125550', 'TESTQNBAATEST001', '9c6a123857f1ea50830fa023ad8c8d1b'));
    echo "</pre>";

    // Start Payment via Meeza Digital SandBox
    echo QNBPayment::createPaymentMeezaSandBox('success.php', 'fail.php', 10000001117, 100083, 123456, 80);

?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>