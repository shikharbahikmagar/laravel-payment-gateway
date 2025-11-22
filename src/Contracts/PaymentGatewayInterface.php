<?php

namespace Shikhar\Payments\Contracts;

interface PaymentGatewayInterface
{

    /**
     * Charge the given amount
     * @param float $amount
     * @param array $payload
     * @return array
     */
    public function charge(float $amount, array $payload = []): array;

    /**
     * Verify the payment if supported
     * @param string $reference
     * @return array
     */
    public function verify(string $reference): array;
}
