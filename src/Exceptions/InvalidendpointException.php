<?php
namespace Proapis\Exceptions;

use Exception;

class InvalidendpointException extends Exception
{
    protected $message = "The API endpoint is invalid.";
}