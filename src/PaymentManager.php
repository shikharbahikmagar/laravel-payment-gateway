<?php

namespace Shikhar\Payments;


use Illuminate\Contracts\Container\Container;
use Shikhar\Payments\Contracts\PaymentGatewayInterface;
use Shikhar\Payments\Gateways\KhaltiGateway;
use Shikhar\Payments\Gateways\EsewaGateway;


class PaymentManager
{
  protected Container $app;
  protected ?PaymentGatewayInterface $driver = null;


  public function __construct(Container $app)
  {
    $this->app = $app;
  }


  /**
   * Set the driver/gateway
   */
  public function via(string $driverName): PaymentGatewayInterface
  {
    $this->driver = $this->resolve($driverName);
    return $this->driver;
  }


  /**
   * Resolve driver from name
   */
  protected function resolve(string $driverName): PaymentGatewayInterface
  {
    $config = config("payments.gateways.{$driverName}");


    return match ($driverName) {
      'khalti' => new KhaltiGateway($config),
      'esewa' => new EsewaGateway($config),
      default => throw new \Exception("Payment driver {$driverName} not supported"),
    };
  }
}
