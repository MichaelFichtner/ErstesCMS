<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
      


$sqldel = "DELETE FROM  `blog`.`blog` WHERE  `blog`.`id` = $delet_id";

$result = mysql_query($sqldel) or die(mysql_error());

$fehler_nr = mysql_errno();
$fehler = mysql_error();

?>
