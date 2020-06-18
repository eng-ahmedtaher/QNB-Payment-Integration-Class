# QNB Payment Integration Class

QNB Payment Integration is a PHP Class for Integrated Payment via QNB Bank.

## Usage

```php
	require_once 'Class/QNBPayment.php';

	// Create Session for Payment SandBox Mode
	QNBPayment::createSessionSandBox();

	// Create Session for Payment Live Mode
	QNBPayment::createSessionLive();

	// Start Payment via MasterCard or Visa in SandBox Mode
	QNBPayment::createPaymentSandBox();

	// Start Payment via MasterCard or Visa in Live Mode
	QNBPayment::createPaymentLive();

	// Get Order Details in SandBox Mode
	QNBPayment::getOrderDetailsSandBox();

	// Get Order Details in Live Mode
	QNBPayment::getOrderDetailsLive();

	// Start Payment via Meeza Digital in SandBox Mode
	QNBPayment::createPaymentMeezaSandBox();

	// Start Payment via Meeza Digital in Live Mode
	QNBPayment::createPaymentMeezaLive();
```

## Example of Payment Method via Master Card or Visa in SandBox Mode
```php

	// Create Session for Payment
	$sessionID = QNBPayment::createSessionSandBox('125550', 'TESTQNBAATEST001', '9c6a123857f1ea50830fa023ad8c8d1b');

	// Start Payment via MasterCard or Visa
	echo QNBPayment::createPaymentSandBox('success.php', 'fail.php', 'TESTQNBAATEST001', '125550', 20.00, $sessionID, 'Test QNB', 'Cairo', 'ahmedtaherinfo0@gmail.com', 0123456789, 'https://yourdomian.com/images/logo.png');

	// Get Order Details
	echo "<pre>";
	print_r(QNBPayment::getOrderDetailsSandBox('125550', 'TESTQNBAATEST001', '9c6a123857f1ea50830fa023ad8c8d1b'));
	echo "</pre>";


```

## Create Session should have contain: 

- Your Order ID in your System, Ex: '125550'.
- Merchant ID  in QNB System, Ex: 'TESTQNBAATEST001'.
- Merchant Password in QNB System, Ex: '9c6a123857f1ea50830fa023ad8c8d1b'.

## Response of Create Session Method
- Create and Retrive Session ID.

## Create Payment Method should have contain: 

- Success URL Upon completion of the Request Success Payment, you will be redirect to this URL.
- Failer URL Upon completion of the Request Failer Payment, you will be redirect to this URL.
- Merchant ID  in QNB System, Ex: 'TESTQNBAATEST001'.
- Your Order ID in your System, Ex: '125550'.
- The Total Price for Order, Ex: '20.00'.
- Session ID, your Created in last step can you get it via Create Session Method.
- Site Name, Ex: 'Test QNB'.
- Site Address, Ex: 'Cairo', can you set null.
- Site Email, Ex: 'ahmedtaherinfo0@gmail.com', can you set null.
- Site Phone, Ex: '0123456789', can you set null.
- Site Logo URL, Ex: 'https://yourdomian.com/images/logo.png', can you set null.

## Get Order Details should have contain: 

- Your Order ID in your System, Ex: '125550'.
- Merchant ID  in QNB System, Ex: 'TESTQNBAATEST001'.
- Merchant Password in QNB System, Ex: '9c6a123857f1ea50830fa023ad8c8d1b'.

## Response of Get Order Details
- All Information of Payment, Ex: 'Payment Method, Total Price, Card Number, Transaction Date, ...'.

## Example of Payment Method via Meeza Digital in SandBox Mode
```php

	// Start Payment via Meeza Digital
	echo createPaymentMeezaSandBox('success.php', 'fail.php', 10000001117, 100083, 123456, 80);

```

## Create Payment Method should have contain: 

- Success URL Upon completion of the Request Success Payment, you will be redirect to this URL.
- Failer URL Upon completion of the Request Failer Payment, you will be redirect to this URL.
- The Configured Merchant ID from UPG, Ex: '10000001117'.
- The Configured Terminal ID from UPG for the Merchant, Ex: '100083'.
- Your Order ID in your System, Ex: '123456'.
- The Total Price for Order, Ex: '80.00'.

## Response of Complete Payment
- Send information of Payment To Success URL via Ajax Post Data.

## Response of Failer Payment
- Redirect to Failer URL.

## Contributing
- For major changes, please open an issue first to discuss what you would like to change.
- Please make sure to update tests as appropriate.

## License
[GNU General Public License](http://www.gnu.org/licenses/old-licenses/gpl-1.0.html)