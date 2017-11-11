<?php

use PHPUnit\Framework\TestCase;

class ValidHostnameTest extends TestCase
{
    public function testPublicDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true));
        $this->assertFalse(AfriCC\Valid\hostname('curlmyip.localdomain', true));
    }

    public function testPrivateDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('test.localdomain', false));
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', false));
    }

    public function testRealDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true, true));
        $this->assertFalse(AfriCC\Valid\hostname('test.localdomain', true, true));
    }

    public function testGlobDomain()
    {
        $this->assertTrue(AfriCC\Valid\hostname('*.curlmyip.net', true, false, true));
        $this->assertFalse(AfriCC\Valid\hostname('w*w.curlmyip.net', true, false, true));
        $this->assertTrue(AfriCC\Valid\hostname('curlmyip.net', true, false, true));
    }
}
