<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    //TO RETRIVE FORM DATA
    $username = $_POST['username'];
    $password = $_POST['password'];

    //DB CONNECTION
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error)
    {
        die("Connection failed: ". $conn->connect_error);

    }

    //VALIDATE LOGIN AUTHENTICIATION
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if($result->num_rows == 1)
    {
        //LOGIN SUCCESS
        header("Location: success.html");
        exit();
    }
    else
    {
        //LOGIN FAILED DUE TO INCORRECT CREDENTIALS
        header("Location: error.html");
        exit();
    }
    $conn->close();
}
?>