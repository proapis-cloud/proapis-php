# PHP SDK for [https://proapis.cloud](https://proapis.cloud)

This is the PHP SDK to consume API services from ProAPIs.cloud. You can require this package using composer or you can download the ZIP file from here to include in your project.

### Installation

```bash
composer require proapis/proapis-client
```

### Google SERPs ([Docs](https://proapis.cloud/apis/google-serps-api/))

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

### Google Play ([Docs](https://proapis.cloud/apis/google-play-api/))

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

### Keywords Data ([Docs](https://proapis.cloud/apis/google-keyword-planner-api/))

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

### Moz Data ([Docs](https://proapis.cloud/apis/moz-api/))

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