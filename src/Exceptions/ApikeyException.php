<?php
namespace Proapis\Exceptions;

use Exception;

class ApikeyException extends Exception
{
    protected $message = "You have not set your API key.";
}