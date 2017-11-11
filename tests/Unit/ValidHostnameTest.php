<?php

use PHPUnit\Framework\TestCase;

class ValidHostnameTest extends TestCase
{
    public function testPublicDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true));
        $this->assertFalse(AfriCC\Valid\hostname('curlmyip.localdomain', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_NOTPUBLIC, $errno);
    }

    public function testPrivateDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('test.localdomain', false));
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', false));
    }

    public function testRealDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true, true));
        $this->assertFalse(AfriCC\Valid\hostname('thisdomainshouldnotexistever1r1341.ad', true, true, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_NODNS, $errno);
    }

    public function testGlobDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('*.curlmyip.net', true, false, true));
        $this->assertFalse(AfriCC\Valid\hostname('w*w.curlmyip.net', true, false, true));
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true, false, true));
    }

    public function testErrorInvalid()
    {
        $this->assertFalse(AfriCC\Valid\hostname('', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_INVALID, $errno);
    }

    public function testErrorEmptyLabel()
    {
        $this->assertFalse(AfriCC\Valid\hostname('.curlmyip.net', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_INVALID, $errno);
    }

    public function testErrorLabelTooLong()
    {
        $this->assertFalse(AfriCC\Valid\hostname(str_repeat('1', 64) . '.curlmyip.net', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_INVALID, $errno);
    }

    public function testErrorDomainTooLong()
    {
        $this->assertFalse(AfriCC\Valid\hostname(str_repeat('1', 255) . '.net', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_INVALID, $errno);
    }

    public function testErrorLabelLeadingHyphen()
    {
        $this->assertFalse(AfriCC\Valid\hostname('-curlmyip.net', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_LEADING_HYPHEN, $errno);
    }

    public function testErrorLabelTrailingHyphen()
    {
        $this->assertFalse(AfriCC\Valid\hostname('curlmyip.net-', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_TRAILING_HYPHEN, $errno);
    }

    public function testErrorLabelDisallowed()
    {
        $this->assertFalse(AfriCC\Valid\hostname('curlmyip%.net', true, false, false, $errno));
        $this->assertEquals(VALID_HOSTNAME_ERROR_DISALLOWED, $errno);
    }
}
