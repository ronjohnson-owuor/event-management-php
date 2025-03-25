<?php
require_once __DIR__. "/../vendor/autoload.php";
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv ->load();

$servername = $_ENV['SERVER_NAME'];
$username = $_ENV['USER_NAME'];
$password = $_ENV['PASS_WORD'];
$dbname = $_ENV['DB_NAME'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}