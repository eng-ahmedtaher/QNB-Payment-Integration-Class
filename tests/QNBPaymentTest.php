<?php

use PHPUnit\Framework\TestCase;
use Payment\QNBPayment;

class QNBPaymentTest extends TestCase
{
    public function testCreateSession()
    {
        $sessionID = QNBPayment::createSessionSandBox(
            '125550',
            'TESTQNBAATEST001',
            '9c6a123857f1ea50830fa023ad8c8d1b'
        );
        $this->assertStringStartsWith('SESSION', $sessionID);
        $this->assertTrue(is_string($sessionID));
    }

    public function testCreatePayment()
    {
        $sessionID = QNBPayment::createSessionSandBox(
            '125550',
            'TESTQNBAATEST001',
            '9c6a123857f1ea50830fa023ad8c8d1b'
        );
        $response =  QNBPayment::createPaymentSandBox(
            'success.php',
            'fail.php',
            'TESTQNBAATEST001',
            '125550',
            20.00,
            $sessionID,
            'Test QNB',
            'Cairo',
            'ahmedtaherinfo0@gmail.com',
            '0123456789',
            'https://yourdomian.com/images/logo.png'
        );
        //var_dump($response);
        $this->assertTrue(is_string($response));
        $this->assertStringStartsWith("<script", $response);
        $this->assertStringEndsWith("</script>", $response);

        $this->assertSame(674, strlen($response));
    }

    public function testGetOrderDetails()
    {
        $response = QNBPayment::getOrderDetailsSandBox('125550', 'TESTQNBAATEST001', '9c6a123857f1ea50830fa023ad8c8d1b');
        $this->assertTrue(is_object($response));
        $this->assertInstanceOf(stdClass::class, $response);
        $this->assertCount(16, get_object_vars($response));
        $this->equalTo(20, $response->amount);
        $this->assertSame('TESTQNBAATEST001', $response->merchant);
        $this->assertSame('EGP', $response->currency);
    }
}
