<?php
$hostname = "localhost";
$username = "root";
$password = "1133";
$database = "latihanCrudK1";

$koneksi = mysqli_connect($hostname, $username, $password, $database);
if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>' . print_r($var, true) . '</pre>';
        exit;
    }
}
if (!function_exists('selected')) {
    function selected($base, $mine)
    {
        return $base !== $mine ?: "selected";
    }
}
