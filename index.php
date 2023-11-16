
<?php
require_once("config/function.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['num_addresses'])) {
        $_SESSION['num_addresses'] = (int)$_POST['num_addresses'];
        header("Location: index.php");
        exit();
    } else {
        saveFormDataToSession();
        header("Location: confirmation.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse Form</title>
</head>
<body>
    <?php
    if (isset($_SESSION['num_addresses'])) {
        displayAddressForm($_SESSION['num_addresses']);
    } else {
        displayNumAddressesForm();
    }
    ?>
</body>
</html>