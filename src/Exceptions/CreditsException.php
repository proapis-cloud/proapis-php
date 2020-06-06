<?php
namespace Proapis\Exceptions;

use Exception;

class CreditsException extends Exception
{
    protected $message = "Your proapis.cloud credits have exhausted. Please buy more at https://proapis.cloud.";
}