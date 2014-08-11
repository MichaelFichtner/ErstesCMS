<?php

/* 
 * 
 * Datenbank Connection
 * 
 */

//error_reporting(E_ALL);

include_once 'config.inc.php'; // Config-Datei includen

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);

if (!$conn) {
    echo "Keine Verbindung zu DB möglich: " . mysql_error();
    exit;
}

if (!mysql_select_db(DB_NAME)) {
    echo "Konnte mydbname nicht selektieren: " . mysql_error();
    exit;
}

$charset = mysql_query("SET NAMES 'utf8'");

// Funktion für Tabellen zugriff 

function db_tab_read($tabele, $order = 'DESC') {
    if ($tabele == 'blog'){
    // $sql = "SELECT * FROM $tabele ORDER BY datum $order";
    
    $sql = "SELECT blog.betreff,
       blog.eintrag,
       DATE_FORMAT (blog.datum, '%d.%m.%Y  (%H:%i)') AS datum,
       user.name,
       blog.user_id
  FROM blog.blog blog INNER JOIN blog.user user ON (blog.`user_id` = user.id)
  ORDER BY datum $order  ";
        
    }else{
        $sql = "SELECT * FROM $tabele";
    }

    $result = mysql_query($sql);

    if (!$result) {
        echo "Konnte Abfrage ($sql) nicht erfolgreich ausführen von DB: " . mysql_error();
        exit;
    }

    return ($result);
}

function db_tab_bearb(){
    $user_id = $_SESSION['user_id'];
    
    $sql_del = "SELECT blog.betreff,
       blog.eintrag,
       DATE_FORMAT (blog.datum, '%d.%m.%Y %H:%i:%s') AS datum,
       user.name,
       blog.id,
       blog.user_id
  FROM blog.blog blog INNER JOIN blog.user user ON (blog.`user_id` = user.id)
  WHERE blog.`user_id` = $user_id
    ";
    
    $result = mysql_query($sql_del);
    
        if (!$result) {
        echo "Konnte Abfrage ($sql_del) nicht erfolgreich ausführen von DB: " . mysql_error();
        exit;
    }
    
    return ($result);
    
}

function db_tab_suchen(){
    // $user_id = $_SESSION['user_id'];
     $suche = isset($_POST['suchstring']) ? $_POST['suchstring'] : '';
    $sql_such = "SELECT blog.betreff,
       blog.eintrag,
       blog.datum,
       user.name,
       blog.id,
       blog.user_id
  FROM blog.blog blog INNER JOIN blog.user user ON (blog.`user_id` = user.id)
  WHERE user.name LIKE '%$suche%'
    ";
    
    $result = mysql_query($sql_such);
    
        if (!$result) {
        echo "Konnte Abfrage ($sql_such) nicht erfolgreich ausführen von DB: " . mysql_error();
        exit;
    }
    
    return ($result);
    
}
