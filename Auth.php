<?php

require __DIR__ . "/vendor/autoload.php";

class Auth
{
    // TODO: store secret key on config file or secure place like environment var
    public static $SECRET_KEY = "1234";

    public static function login($username, $password)
    {
        // TODO: use passrod_verify instead of logical operator
        if ($username === "admin" && $password === "admin") {
            $payload = [
                "session_id" => uniqid(),
                "username" => $username,
                "role"  => "customer"
            ];

            $jwt = \Firebase\JWT\JWT::encode($payload, Auth::$SECRET_KEY, 'HS256');
            setcookie("JWT-SESSION", $jwt); // TODO: make http only cookie to prevent XSS Attack
            return true;
        } else {
            return false;
        }
    }

    public static function getCurrentUser()
    {
        if (isset($_COOKIE['JWT-SESSION'])) {
            try {
                $jwt = $_COOKIE['JWT-SESSION'];
                $payload = \Firebase\JWT\JWT::decode($jwt, Auth::$SECRET_KEY, ['HS256']);
                return $payload;
            } catch (Exception $exception) {
                throw new Exception("User is not login");
            }
        } else {
            throw new Exception("User is not login");
        }
    }
}
