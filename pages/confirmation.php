
<?php
session_start();

require_once 'config/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    saveFormDataToSession();
    saveConfirmedDataToDatabase();
    header("Location: confirmation.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation</title>
</head>
<body>
    <h2>Confirmation des adresses</h2>
    <?php
    displayConfirmedAddresses();
    ?>
    <form action="update_addresses.php" method="post">
        <button type="submit">Modifier les informations</button>
    </form>
</body>
</html>
