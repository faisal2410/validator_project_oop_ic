<?php
// InputCheckTrait.php
trait InputCheckTrait
{
    public function isEmpty($input): bool
    {
        return $input === '';
    }
}
