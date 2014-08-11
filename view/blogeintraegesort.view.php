    <?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    echo "<div class='row'>";
    echo '<h2 class="text-center">Blog Ansicht</h2>';
    //echo $navigation . "  :  " . $sortieren;
    while ($row = mysql_fetch_object($daten)) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<tbody>";  
        echo "<tr>";
        echo "<td>Datum :</td>";
        echo "<td>" . $row->datum . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width='90'>Name :</td>";
        echo "<td>" . $row->name . "</td>";   
        echo "</tr>";
        echo "<tr>";
        echo "<td>Betreff :</td>";
        echo "<td>" . $row->betreff . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Eintrag :</td>";
        echo "<td>" . $row->eintrag . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td></td>";
        echo "<td class='comi'>"
        . '<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#my">
        Kommentar
        </button>'
        . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";          
        echo "</div>";
    }
echo "</div>";
?>


<!--            <button id="ttb">ausblenden</button><button id="ttb1" class="text-right">einblenden</button>
<div id="tt" class="col-sm-push-5"> 

<p>Auch gibt es niemanden, der den Schmerz an sich liebt, sucht oder wünscht, 
    nur, weil er Schmerz ist, es sei denn, es kommt zu zufälligen Umständen, 
    in denen Mühen und Schmerz ihm große Freude bereiten können.</p>

<p>Um ein triviales Beispiel zu nehmen, wer von uns unterzieht sich je anstrengender 
    körperlicher Betätigung, außer um Vorteile daraus zu ziehen? Aber wer hat irgend ein Recht,
    einen Menschen zu tadeln, der die Entscheidung trifft, eine Freude zu genießen, 
    die keine unangenehmen Folgen hat, oder einen, der Schmerz vermeidet, 
    welcher keine daraus resultierende Freude nach sich zieht? Auch gibt es niemanden,
    der den Schmerz</p>

</div>-->

<!--"<a class='btn btn-default disabled' href='kommentar.view.php' >Write Comment &raquo;</a>"-->