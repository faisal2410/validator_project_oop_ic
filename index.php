<?php
require_once 'ValidatorManager.php';
require_once 'StringValidator.php';
require_once 'IntegerValidator.php';
require_once 'EmailValidator.php';
require_once 'FloatValidator.php';
require_once 'DateValidator.php';

$manager = new ValidatorManager();
$manager->registerValidator('string', new StringValidator());
$manager->registerValidator('integer', new IntegerValidator());
$manager->registerValidator('email', new EmailValidator());
$manager->registerValidator('float', new FloatValidator());
$manager->registerValidator('date', new DateValidator());

$inputValue = '';
$inputType = '';
$validationResult = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputValue = $_POST['inputValue'] ?? '';
    $inputType = $_POST['inputType'] ?? '';

    if ($manager->hasValidator($inputType)) {
        $validator = $manager->getValidator($inputType);
        $isValid = $validator->validate($inputValue);
        if ($isValid) {
            $validationResult = 'Valid Input';
        } else {
            $validationResult = $validator->getErrorMessage(); // Show specific error message
        }
    } else {
        $validationResult = 'Invalid input type selected.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP OOP Validator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <h1>PHP OOP Validator</h1>
    <form method="post" action="">
        <label for="inputValue">Enter Value:</label><br>
        <input type="text" id="inputValue" name="inputValue" value="<?php echo htmlspecialchars($inputValue); ?>" required><br><br>

        <label for="inputType">Select Input Type:</label><br>
        <select id="inputType" name="inputType" required>
            <option value="">--Select Type--</option>
            <option value="string" <?php if ($inputType === 'string') echo 'selected'; ?>>String</option>
            <option value="integer" <?php if ($inputType === 'integer') echo 'selected'; ?>>Integer</option>
            <option value="email" <?php if ($inputType === 'email') echo 'selected'; ?>>Email</option>
            <option value="float" <?php if ($inputType === 'float') echo 'selected'; ?>>Float</option>
            <option value="date" <?php if ($inputType === 'date') echo 'selected'; ?>>Date (YYYY-MM-DD)</option>
        </select><br><br>

        <input type="submit" value="Validate">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Validation Result:</h2>
        <p><?php echo htmlspecialchars($validationResult); ?></p>
    <?php endif; ?>
</body>

</html>