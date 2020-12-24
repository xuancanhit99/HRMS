<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hrmsdb';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Fail: " . mysqli_connect_error());
}