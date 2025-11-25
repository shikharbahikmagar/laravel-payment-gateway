<?php

namespace Shikhar\Payments\Gateways;


use Shikhar\Payments\Contracts\PaymentGatewayInterface;

class KhaltiGateway implements PaymentGatewayInterface
{
  protected array $config;

  //@param array $config

  public function __construct(array $config)
  {
    $this->config = $config;
  }

  public function charge(float $amount, array $payload = []): array
  {
    // Simulated Khalti API call
    return [
      'status' => true,
      'message' => "Paid NPR {$amount} via Khalti",
      'meta' => $payload
    ];
  }

  public function verify(string $reference): array
  {
    return [
      'status' => true,
      'message' => "Payment {$reference} verified via Khalti",
    ];
  }
}
