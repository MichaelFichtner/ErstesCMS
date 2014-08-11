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
    
    <h2 class="text-center">Suchergebniss von "<strong><?php echo $suche ?></strong>"</h2>

<form action='index.php' method='POST'>
    <input type="hidden" name="insertsent" value="1" />
<table class="table table-hover">
    <thead>
        <tr>
            <th>Datum</th>
            <th>Meinung</th>
            <th>Eintrag</th>
        </tr>
    </thead>
    <tbody>

<?php
while ($row = mysql_fetch_object($daten)) {

    echo    "<tr>";
    echo        "<td width='10%'>" . $row->datum   . " </td>";
    echo        "<td width='20%'>" . $row->betreff . "</td>";
    echo        "<td width='60%'>" . $row->eintrag . "</td>";   
    echo    "</tr>";

}
?>

    </tbody>
</table>
   <div class="text-center">
       <a href="index.php?nav=1"><input type="button" class="btn btn-default" value="Abbruch" /></a>     
        </div>

</form>

</div>
    
<div class="col-lg-1">    

</div>
