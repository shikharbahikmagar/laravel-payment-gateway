<?php

namespace Shikhar\Payments\Providers;

use Illuminate\Support\ServiceProvider;
use Shikhar\Payments\PaymentManager;

class PaymentServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    // Bind PaymentManager singleton to the service container
    $this->app->singleton('payment', function ($app) {
      return new PaymentManager($app);
    });

    // Merge package config
    $this->mergeConfigFrom(__DIR__ . '/../../config/payments.php', 'payments');
  }

  public function boot(): void
  {
    // Publish config
    $this->publishes([
      __DIR__ . '/../../config/payments.php' => config_path('payments.php'),
    ], 'payments-config');

    // ✅ Load package views
    $this->loadViewsFrom(
      __DIR__ . '/../resources/views',
      'shikhar-payments'
    );

    // ✅ Publish views (for customization)
    $this->publishes([
      __DIR__ . '/../resources/views' => resource_path('views/vendor/shikhar-payments'),
    ], 'shikhar-payments-views');
  }
}
