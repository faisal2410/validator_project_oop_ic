<?php
interface ValidationInterface
{
    public function validate($input): bool;
    public function getErrorMessage(): string;
}
