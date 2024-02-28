<?php

use App\Services\TokenValidationService;
use Tests\TestCase;

class TokenValidationServiceTest extends TestCase
{
    /** @test */
    public function it_validates_a_valid_token()
    {
        $tokenValidator = new TokenValidationService();

        $isValid = $tokenValidator->tokenIsValid('token');

        $this->assertTrue($isValid);
    }

    /** @test */
    public function it_rejects_an_invalid_token()
    {
        $tokenValidator = new TokenValidationService();

        $isValid = $tokenValidator->tokenIsValid('(]');

        $this->assertFalse($isValid);
    }
}
