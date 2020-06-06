<?php
namespace Proapis\Exceptions;

use Exception;

class InvalidkeyException extends Exception
{
    protected $message = "Your API key is invalid.";
}