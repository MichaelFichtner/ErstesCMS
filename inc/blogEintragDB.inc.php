<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// include './inc/db_connect.inc.php';
// print_r($_SESSION);
$user_id = $_SESSION['user_id'];


$sqlin_b = "INSERT INTO `blog`(`user_id`, `betreff`, `eintrag`, `datum`)"
    . "VALUES ($user_id, '$betreff', '$eintrag', NOW())";

$result = mysql_query($sqlin_b) or die(mysql_error());
echo mysql_errno();
echo mysql_error();
