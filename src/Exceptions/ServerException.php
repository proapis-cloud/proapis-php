<?php
namespace Proapis\Exceptions;

use Exception;

class ServerException extends Exception
{
    protected $message = "Our API servers are currently down.";
}