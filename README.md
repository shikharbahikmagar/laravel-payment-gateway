# Laravel Custom Payment Package

A simple and customizable Laravel payment integration package that allows developers to easily process payments, verify transactions, and integrate multiple gateways with a clean and extensible architecture.

## 🚀 Features

- Easy installation via Composer
- Configurable payment gateways
- Unified API for handling payment requests
- Payment verification methods
- Laravel Facade support
- Fully extendable classes
- Supports Laravel 9+



## 📦 Installation

Install via Composer:

```bash
composer require shikhar/laravel-payments

## Env variables


ESEWA_SECRET_KEY="8gBm/:&EnhH.1/q"  ## Only For Testting
ESEWA_MERCHANT_ID=EPAYTEST
ESEWA_SUCCESS_URL=https://yourapp.com/esewa/success
ESEWA_FAILURE_URL=https://yourapp.com/esewa/failure

