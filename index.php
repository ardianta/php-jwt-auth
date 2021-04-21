<?php
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/Auth.php";

try {
    $user = Auth::getCurrentUser();
} catch (Exception $e) {
    header("Location: login.php");
}

?>

<h1>Hello <?php echo $user->username ?></h1>

<a href="logout.php">Logout</a>