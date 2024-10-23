<?php
// EmailValidator.php
require_once 'ValidationInterface.php';
require_once 'InputSanitizerTrait.php';
require_once 'InputCheckTrait.php';

class EmailValidator implements ValidationInterface
{
    use InputSanitizerTrait, InputCheckTrait;

    private $errorMessage = '';

    public function validate($input): bool
    {
        $input = $this->sanitize($input);

        if ($this->isEmpty($input)) {
            $this->errorMessage = 'Email cannot be empty.';
            return false;
        }

        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = 'Invalid email format.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}