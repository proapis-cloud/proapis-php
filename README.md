# PHP SDK for [https://proapis.cloud](https://proapis.cloud)

This is the PHP SDK to consume API services from ProAPIs.cloud. You can require this package using composer or you can download the ZIP file from here to include in your project.

## Installation

```bash
composer require proapis/proapis-client
```

## Getting Started
Get your API key at [https://proapis.cloud](https://proapis.cloud) first. And then include the autoload file in your project:
```php
require "vendor/autoload.php";
```

## Google SERPs ([Docs](https://proapis.cloud/apis/google-serps-api/))

```php
use Proapis\Services\GoogleSerps;

// Set your API key
$apiKey = "######################";

// Create instance
$gs = new GoogleSerps($ApiKey);

// Get data
$params = [
    "q" => "Your search query",
    "pages" => 10,
    "hl" => "en_US",
    "gl" => "us",
    "ua" => "desktop"
];
$data = $gs->getData($params);
```

## Google Play ([Docs](https://proapis.cloud/apis/google-play-api/))

```php
use Proapis\Services\GooglePlay;

// Set your API key
$apiKey = "######################";

// Create instance
$gp = new GooglePlay($ApiKey);

// Get data
$params = [
    "package" => "com.whatsapp"
];
$data = $gp->getData($params);
```

## Keywords Data ([Docs](https://proapis.cloud/apis/google-keyword-planner-api/))

```php
use Proapis\Services\Keywords;

// Set your API key
$apiKey = "######################";

// Create instance
$kp = new Keywords($ApiKey);

// Get data
$params = [
    "keyword" => "hiking shoes"
];
$data = $kp->getData($params);
```

## Moz Data ([Docs](https://proapis.cloud/apis/moz-api/))

```php
use Proapis\Services\Moz;

// Set your API key
$apiKey = "######################";

// Create instance
$moz = new Moz($ApiKey);

// Get data
$data = [
    "domains" => ["google.com", "facebook.com", "wikipedia.org"]
];
$data = $moz->getData($data);
```

## Catching Exceptions
The API client throws several exceptions based on the errors that encountered. Here is now to catch the exceptions and act appropriately:

```php
use Proapis\Services\GoogleSerps;
use Proapis\Exceptions\ApikeyException;
use Proapis\Exceptions\CreditsException;
use Proapis\Exceptions\InvalidkeyException;
use Proapis\Exceptions\ServerException;
use Proapis\Exceptions\ValidationException;

// Set your API key
$apiKey = "######################";

// Create instance
$gs = new GoogleSerps($ApiKey);

// Get data
$params = [
    "q" => "Your search query",
    "pages" => 10,
    "hl" => "en_US",
    "gl" => "us",
    "ua" => "desktop"
];

try
{
    $data = $gs->getData($params);
    print_r($data);
} catch(ApikeyException $e) 
{
    // API key not provided
} catch(CreditsException $e)
{
    // Credits exhausted. Buy more at https://proapis.cloud
} catch(InvalidkeyException $e)
{
    // API key is invalid
} catch(ServerException $e)
{
    // Our servers are down. Maybe for maintenance
} catch(ValidationException $e)
{
    // Validation errors occured
    print_r($e->getMessage());
}
```

## Issues & Bugs

For common bug reports, please use the issues. For security-related issues, contact us at [https://proapis.cloud/contact-us](https://proapis.cloud/contact-us).