# PHP OOP Validator Project

This project is a simple PHP-based input validation system that demonstrates object-oriented programming (OOP) concepts such as **interfaces**, **traits**, and **custom error handling**. The validators include multiple types such as string, integer, email, float, and date, and can easily be extended by adding new validators.

The goal of this project is to demonstrate how to implement reusable and scalable validation logic while emphasizing modularity and clean architecture.

## Table of Contents
- [Project Structure](#project-structure)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Validators](#validators)
- [Extending the Project](#extending-the-project)
- [Contributing](#contributing)

## Project Structure

├── index.php            # Main entry point for the project (UI and logic).
├── ValidatorManager.php  # Central manager for registering and retrieving validators.
├── ValidationInterface.php  # Interface for validators to implement.
├── StringValidator.php   # Validator for string inputs.
├── IntegerValidator.php  # Validator for integer inputs.
├── EmailValidator.php    # Validator for email inputs.
├── FloatValidator.php    # Validator for float inputs.
├── DateValidator.php     # Validator for date inputs.
├── autoload_validators.php  # Autoloads all validators.
├── traits
│   ├── InputSanitizerTrait.php  # Trait for input sanitization.
│   ├── InputCheckTrait.php      # Trait for basic input checks.
└── README.md            # This file.


## Features

### Centralized Validation Management:
 Use ValidatorManager to register and manage various validators.

### Modular Validators: 
Each validator is implemented as a separate class, making the system highly extensible.
Custom Error Messages: Each validator provides specific error messages when validation fails.

### Traits for Code Reusability: 
Traits like InputSanitizerTrait and InputCheckTrait are used to handle common functionality such as sanitization and empty checks.

### Dynamic Validator Loading: 
The project automatically loads new validators added to the directory via the autoload system.

### Error Reporting: 
Validators return detailed error messages to the user for failed validation attempts.

## Installation
Clone the Repository:

```
git clone https://github.com/yourusername/php-oop-validator.git
```




### Navigate to the Project Directory:

```
cd php-oop-validator
```
### Start a Local PHP Server:

You can run the built-in PHP server to host the application:

```
php -S localhost:8000
```
### Access the Project in Your Browser:

Open your browser and go to http://localhost:8000/index.php.

## Usage
In the main page (index.php), you will see a form that allows you to enter a value and select its type (String, Integer, Email, Float, or Date).

After submitting the form, the system will validate the input based on the selected type and provide feedback on whether the input is valid or invalid.

If the input is invalid, the system will display a specific error message explaining what went wrong (e.g., "The value must be an integer").

## Validators
The project currently supports the following validators:

StringValidator: Validates non-empty string inputs.

IntegerValidator: Validates integer inputs.

EmailValidator: Validates properly formatted email addresses.

FloatValidator: Validates float (decimal) inputs.

DateValidator: Validates dates in the format YYYY-MM-DD.

Each validator implements the ValidationInterface and provides a getErrorMessage() method to retrieve detailed error messages when validation fails.

## Example Validators:
### Integer Validator:
```
$validator = new IntegerValidator();
$isValid = $validator->validate(123);
if (!$isValid) {
    echo $validator->getErrorMessage();  // Outputs: "The value must be an integer."
}
```
### Email Validator:
```
$validator = new EmailValidator();
$isValid = $validator->validate("test@example.com");
if (!$isValid) {
    echo $validator->getErrorMessage();  // Outputs: "Invalid email format."
}
```

## Extending the Project

### Adding New Validators

#### To add a new validator:

Create a new file in the project root (e.g., PhoneNumberValidator.php).

Implement the ValidationInterface and define the validate() and getErrorMessage() methods.

Register the new validator in index.php:

```
$manager->registerValidator('phone', new PhoneNumberValidator());
```
Update the front-end HTML in index.php to include the new validator as an option.

## Example:

### PhoneNumberValidator.php:

```
class PhoneNumberValidator implements ValidationInterface {
    private $errorMessage = '';

    public function validate($input): bool {
        if (!preg_match('/^[0-9]{10}$/', $input)) {
            $this->errorMessage = 'Phone number must be 10 digits.';
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string {
        return $this->errorMessage;
    }
}
```

Then, register it in the ValidatorManager:

```
$manager->registerValidator('phone', new PhoneNumberValidator());
```
## Contributing

If you wish to contribute to this project:

Fork the repository.

Create a new branch (git checkout -b feature/new-validator).

Make your changes and commit them (git commit -am 'Add new feature').

Push to the branch (git push origin feature/new-validator).

Open a pull request to merge your changes.

This project serves as a great way to learn and practice PHP OOP principles, especially interfaces, traits, and building scalable, reusable code.

