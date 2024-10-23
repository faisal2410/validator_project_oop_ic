<?php
// DateValidator.php
require_once 'ValidationInterface.php';
require_once 'InputSanitizerTrait.php';
require_once 'InputCheckTrait.php';

class DateValidator implements ValidationInterface
{
    use InputSanitizerTrait, InputCheckTrait;

    private $errorMessage = '';

    public function validate($input): bool
    {
        $input = $this->sanitize($input);

        if ($this->isEmpty($input)) {
            $this->errorMessage = 'Date cannot be empty.';
            return false;
        }

        $date = DateTime::createFromFormat('Y-m-d', $input);
        if (!$date || $date->format('Y-m-d') !== $input) {
            $this->errorMessage = 'The date format must be YYYY-MM-DD.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}