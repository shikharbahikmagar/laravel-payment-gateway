<?php

namespace Shikhar\Payments\Gateways;


use Shikhar\Payments\Contracts\PaymentGatewayInterface;

class EsewaGateway implements PaymentGatewayInterface
{
  protected array $config;

  public function __construct(array $config)
  {
    $this->config = $config;
  }

  public function charge(float $amount, array $payload = []): array
  {

    // dd($this->config);
    // dd($payload);
    $tax = $payload['tax_amount'] ?? 0;
    $totalAmount = $amount + $tax;

    $transactionUuid = $payload['transaction_uuid'] ?? uniqid();
    $productCode = $payload['product_code'];

    // Signed fields

    $signedFieldNames = "total_amount,transaction_uuid,product_code";
    $Message = "total_amount={$totalAmount},transaction_uuid={$transactionUuid},product_code={$productCode}";

    $secret = $this->config['secret_key'];


    $signature = base64_encode(
      hash_hmac('sha256', $Message, $secret, true)
    );

    // Form payload for Esewa
    $formFields = [
      "amount" => $amount,
      "tax_amount" => $tax,
      "total_amount" => $totalAmount,
      "transaction_uuid" => $transactionUuid,
      "product_code" => $productCode,
      "product_service_charge" => 0,
      "product_delivery_charge" => 0,
      "success_url" => $payload['success_url'],
      "failure_url" => $payload['failure_url'],
      "signed_field_names" => $signedFieldNames,
      "signature" => $signature,
    ];

    return [
      'status' => true,
      'action_url' => $this->config['form_url'],
      'fields' => $formFields
    ];
  }

  public function verify(string $reference): array
  {
    return [
      'status' => true,
      'message' => "Payment {$reference} verified via esewa",
    ];
  }
}
