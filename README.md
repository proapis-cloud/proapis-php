# PHP SDK for (https://proapis.cloud)[https://proapis.cloud]

This is the PHP SDK to consume API services from ProAPIs.cloud. You can require this package using composer or you can download the ZIP file from here to include in your project.

### Install

```bash
composer require proapis/proapis-client
```

### Google SERPs API

```
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