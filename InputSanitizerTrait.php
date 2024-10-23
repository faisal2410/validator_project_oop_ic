<?php
// InputSanitizerTrait.php
trait InputSanitizerTrait
{
    public function sanitize($input)
    {
        return trim($input);
    }
}
