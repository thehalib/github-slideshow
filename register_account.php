<?php

include 'dbaccess.php';

global $db;

$insert = "INSERT INTO iBayMembers (password, name, username, email, address, postcode, rating)
                          VALUES (?, ?, ?, ?, ?, ?, ?);";

$query = $db->prepare($insert);
$password = password_hash($_POST['uPassword'], PASSWORD_DEFAULT);
$name = $_POST['uName'];
$username = strtolower($_POST['uUsername']);
$email = strtolower($_POST['uEmail']);
$array = array($_POST['uAddress1'], $_POST['uAddress2'], $_POST['uAddress3']);
$address = implode("\r", $array);
$postcode = strtoupper($_POST['uPostcode']);
if(strlen($postcode) == 7){
  $postcode = substr($postcode, 0, 4).' '.substr($postcode, 4);
}
$rating  = 3;

// TO DO:

$query->bind_param("ssssssi", $password, $name, $username, $email, $address, $postcode, $rating);

$result = $query->execute();


header("Location: login.php");



?>
