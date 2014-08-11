<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Variablen checken
                    $view = 'index.php?navi=1';
                    $inc = '';
                    $error_message = '';
                    $online = '';
                    $order = '';
                    $user_id = '';
                    $id = '';

// navi check
                    $navigation = isset($_GET['navi']) ? $_GET['navi'] : '0';
                    $sortieren = isset($_GET['sort']) ? $_GET['sort'] : '0';

// Login Logout
                    $sent = isset($_POST['sent']) ? $_POST['sent'] : '';
                    $user = isset($_POST['username']) ? $_POST['username'] : '';
                    $passw = isset($_POST['password']) ? $_POST['password'] : '';
                    $enduser = '';
 // User und Blog                  
                    $insertsent = isset($_POST['insertsent']) ? $_POST['insertsent'] : '';
                    $insertsent_b = isset($_POST['insertsent_b']) ? $_POST['insertsent_b'] : '';
                    $insertsent_del = isset($_POST['insertsent_del']) ? $_POST['insertsent_del'] : '';
                    $name = isset($_POST['name']) ? $_POST['name'] : '';
                    $alter = isset($_POST['alter']) ? $_POST['alter'] : '';
                    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
                    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
                    $beschreibung = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : '';
                    $pw1 = isset($_POST['passw']) ? $_POST['passw'] : '';
                    $pw2 = isset($_POST['passw2']) ? $_POST['passw2'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $sent = isset($_POST['sent']) ? $_POST['sent'] : '';
                    $betreff = isset($_POST['betreff']) ? $_POST['betreff'] : '';
                    $eintrag = isset($_POST['eintrag']) ? $_POST['eintrag'] : '';
                    $delet_id = isset($_POST['del']) ? $_POST['del'] : '';
                    $suche = isset($_POST['suchstring']) ? $_POST['suchstring'] : '';
                    
// kommentar
                    
                    $name_kom = isset($_POST['name_kom']) ? $_POST['name_kom'] : '';
                    $kommentar = isset($_POST['kommentar']) ? $_POST['kommentar'] : '';

                    
