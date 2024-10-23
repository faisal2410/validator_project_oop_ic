<?php
class ValidatorManager
{
    private $validators = [];

    // Register a validator with a specific name (e.g., 'string', 'integer')
    public function registerValidator(string $type, ValidationInterface $validator)
    {
        $this->validators[$type] = $validator;
    }

    // Get the validator by its name
    public function getValidator(string $type): ?ValidationInterface
    {
        return $this->validators[$type] ?? null;
    }

    // Check if the validator exists
    public function hasValidator(string $type): bool
    {
        return isset($this->validators[$type]);
    }
}
