<?php

namespace App\Tests\Unit;

use App\Service\SecurityService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class SecurityServiceTest extends TestCase
{
    public function testValidatePasswordUppercase()
    {
        $securityService = new SecurityService($this->createMock(\Doctrine\ORM\EntityManagerInterface::class));

        $securityService->validatePasswordStrength('lowercase');

        $this->assertNull($securityService->validatePasswordStrength('WithUppercase'));
    }

    public function testValidatePasswordLowercase()
    {
        $securityService = new SecurityService($this->createMock(\Doctrine\ORM\EntityManagerInterface::class));

        $securityService->validatePasswordStrength('UPPERCASE');

        $this->assertNull($securityService->validatePasswordStrength('withLowercase'));
    }

    public function testValidatePasswordDigit()
    {
        $securityService = new SecurityService($this->createMock(\Doctrine\ORM\EntityManagerInterface::class));

        $securityService->validatePasswordStrength('NoDigit');

        $this->assertNull($securityService->validatePasswordStrength('WithDigit1'));
    }

    public function testValidatePasswordSpecialCharacter()
    {
        $securityService = new SecurityService($this->createMock(\Doctrine\ORM\EntityManagerInterface::class));

        $securityService->validatePasswordStrength('NoSpecialCharacter');

        $this->assertNull($securityService->validatePasswordStrength('WithSpecialChar#'));
    }
}