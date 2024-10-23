<?php
// IntegerValidator.php
require_once 'ValidationInterface.php';
require_once 'InputSanitizerTrait.php';
require_once 'InputCheckTrait.php';

class IntegerValidator implements ValidationInterface
{
    use InputSanitizerTrait, InputCheckTrait;

    private $errorMessage = '';

    public function validate($input): bool
    {
        $input = $this->sanitize($input);

        if ($this->isEmpty($input)) {
            $this->errorMessage = 'Integer value cannot be empty.';
            return false;
        }

        if (!filter_var($input, FILTER_VALIDATE_INT)) {
            $this->errorMessage = 'The value must be an integer.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
