<?php
// StringValidator.php
require_once 'ValidationInterface.php';
require_once 'InputSanitizerTrait.php';
require_once 'InputCheckTrait.php';

class StringValidator implements ValidationInterface
{
    use InputSanitizerTrait, InputCheckTrait;

    private $errorMessage = '';

    public function validate($input): bool
    {
        $input = $this->sanitize($input);

        if ($this->isEmpty($input)) {
            $this->errorMessage = 'String cannot be empty.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}