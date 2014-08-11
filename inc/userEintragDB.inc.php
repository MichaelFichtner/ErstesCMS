<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include './inc/db_connect.inc.php';

// echo $name . $nickname . $alter . $gender . $email . $pw2 . $beschreibung;


$sqlin = "INSERT INTO `user`(`name`, `nickname`, `alter`, `gender`, `email`, `password`, `beschreibung`)"
    . "VALUES ('$name', '$nickname', '$alter', '$gender', '$email', '$pw2', '$beschreibung')";

$result = mysql_query($sqlin) or die(mysql_error());
//echo mysql_errno();
//echo mysql_error();

