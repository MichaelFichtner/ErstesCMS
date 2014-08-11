<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="col-lg-1">    

</div>

<div class="col-lg-10">
    
    <h2 class="text-center">Blogeintrag erstellen</h2>

<form action='index.php' method='POST'>
    <input type="hidden" name="insertsent" value="1" />
<table class="table table-hover">
    <thead>
        <tr>
            <th>Datum</th>
            <th>Meinung</th>
            <th>Eintrag</th>
            <th>Löschen</th>
        </tr>
    </thead>
    <tbody>

<?php
while ($row = mysql_fetch_object($daten)) {
        
    echo    "<tr>";
    // echo        "<td width='10%'>" . $row->user_id   . " </td>";
    // echo        "<td width='10%'>" . $row->name   . " </td>";
    echo        "<td width='15%'>" . $row->datum   . " </td>";
    echo        "<td width='20%'>" . $row->betreff . "</td>";
    echo        "<td width='65%'>" . $row->eintrag . "</td>";
    echo        "<td><input type = 'radio' name = 'del' value = ".$row->id." /></td>";    
    echo    "</tr>";

}
?>

    </tbody>
</table>
   <div class="text-center">
       <a href="index.php?nav=1"><input type="button" class="btn btn-default" value="Abbruch" /></a>
       <input type="submit" class="btn btn-default" value="Löschen" />     
        </div>

</form>

</div>
    
<div class="col-lg-1">    

</div>