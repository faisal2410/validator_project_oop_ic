<?php
// FloatValidator.php
require_once 'ValidationInterface.php';
require_once 'InputSanitizerTrait.php';
require_once 'InputCheckTrait.php';

class FloatValidator implements ValidationInterface
{
    use InputSanitizerTrait, InputCheckTrait;

    private $errorMessage = '';

    public function validate($input): bool
    {
        $input = $this->sanitize($input);

        if ($this->isEmpty($input)) {
            $this->errorMessage = 'Float value cannot be empty.';
            return false;
        }

        if (!filter_var($input, FILTER_VALIDATE_FLOAT)) {
            $this->errorMessage = 'The value must be a float.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}