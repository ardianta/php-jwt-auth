<?php
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/Auth.php";


$message = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (Auth::login($username, $password)) {
        header("Location: index.php");
        exit(0);
    } else {
        $message = "Gagal Login";
    }
}

echo $message;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Home App</title>
</head>

<body>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <br>
        <input type="submit" value="Login">
    </form>

</body>

</html>