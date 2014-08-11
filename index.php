<?php
session_start();
include './inc/db_connect.inc.php';
include './inc/variablen.inc.php';

// if ($sent == 'wiwi'){
//     session_unset();
//     session_destroy();
//     $view = 'logout.view.php';
// }
// print_r($_SESSION);
 
$daten = db_tab_read('blog', 'DESC');


// Auswertung der Navigation ...

switch ($navigation) {
    case '1':
        $daten = db_tab_read('blog', 'DESC');
        $view = 'blogeintraegesort.view.php';
        break;
    case '2':
        $daten = db_tab_read('blog', 'ASC');
        $view = 'blogeintraegesort.view.php';
        break;
    case '3':
        $daten = db_tab_bearb();
        $view = 'blogeintrag.view.php';
        break;
//  case '4':
//      echo '<h2>Blogeintrag Edieren</h2>';
//      include 'inc/blogeintragedit.inc.php';
//      break;
    case '5':
        $daten = db_tab_bearb();
        $view = 'blogeintragdel.view.php';
        break;
    case '6' :
        $view = 'reg.view.php';
        // Gender checkt
        if ($gender === 'male') {
            $male = "checked=''";
        }
        if ($gender === 'female') {
            $female = "checked=''";
        }
        break;
    default:
//      $daten = db_tabele('blog');
        $view = 'blogeintraegesort.view.php';
        break;
}
// Auswertung Formular "Regestrirung" ..

if ($insertsent and $name and $nickname and $email) {

    if ($pw1 == $pw2) {
        include './inc/userEintragDB.inc.php';
        $view = 'usereintragDB.view.php';
    } else {
        // Gender checkt
        if ($gender === 'male') {
            $male = "checked=''";
        }
        if ($gender === 'female') {
            $female = "checked=''";
        }
        $error_message = "Passwort nicht Identisch";
        $view = 'reg.view.php';
    }
}


// Auswertung Formular "Blog eintrag" ..

if ($insertsent_b and $betreff) {

if ($eintrag > '') {
        include './inc/blogEintragDB.inc.php';
        $view = 'blogeintragDB.view.php';
    } else {
        $error_message = "Das darf nicht passieren Sorry";
        $view = 'error.view.php';
        }
        
    }
    
// Auswertung Formular "Blog Löschen" ..

if ($insertsent and $delet_id) {

    include './inc/blogeintragdelDB.inc.php';
 if ($fehler_nr == 0) {
    $daten = db_tab_bearb();
    $view = 'blogeintragdel.view.php';
    } else {
        $error_message = $fehler;
        $view = 'error.view.php';
        }
        
    }
    
// Auswertung Formular "Kommentar " ..

if ($insertsent and $name_kom) {

    $inc = 'kommentar.inc.php';
// if ($fehler_nr == 0) {
//    $daten = db_tab_bearb();
//    $view = 'blogeintragdel.view.php';
//    } else {
//        $error_message = $fehler;
//        $view = 'error.view.php';
//        }
//        
    }        

// Suchroutine ... (wurde Suchformular ausgefüllt ?)

                    if ($sent and $suche) {
                       $daten = db_tab_suchen(); 
                       $view = 'suchen.view.php';
                    }
    
    
// Login - Logout
if ($sent and $user and $passw){
    $daten = db_tab_read('user', '');
    while ($row = mysql_fetch_object($daten)){
        if ($row->name == $user && $row->password == $passw){
            $_SESSION['online'] = $sent;
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $row->id;
            $view = 'login.view.php';
            break;
         }

    }
         if (!$_SESSION['user']) {
                $error_message = "Name oder Password falsch";
                $view = 'error.view.php';
         }
}
    
 if ($sent == 'wiwi'){
     $enduser = $_SESSION['user'];
     session_unset();
     session_destroy();
     $view = 'logout.view.php';
 }
    

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Devil - Blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?navi=1">Devil - Blog</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php?navi=1">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anzeige Art<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?navi=1&AMP;sort=new">Neu zuerst</a></li>
                                <li><a href="index.php?navi=2&AMP;sort=old">Alt zuerst</a></li>
                            </ul>
                        </li>                    
                    <?php if (isset ($_SESSION['online']))  { ?><!-- // erst wenn eingelogt sichtbar -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?navi=3">Erstellen</a></li>
                                    <li class="disabled"><a href="index.php?navi=4" >Bearbeiten</a></li>
                                    <li><a href="index.php?navi=5">Löschen</a></li>
                                </ul>
                            </li>
                    <?php } ?>        
                    </ul> 

                    <form class="navbar-form navbar-right" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        
<!-- wenn eingelogt wird LOGIN - Formular ausgeblendet -->                        
                        
            <?php if (!isset ($_SESSION['online']))  { ?>                        
                        <a href="index.php?navi=6">Registrieren</a>
                        <div class="form-group">
                            <input type="text" placeholder="Name (nicht Nickname)" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                        <input type="hidden" value="1" name="sent" />
            <?php }else {?>
<!-- und dafür dieses hier eingefügt -->                        
                        <div class="alert alert-danger"> Du bist mit  "<strong><?php echo $_SESSION['user'] ?></strong>"  eingeloggt
                        
            <?php }?>
            <?php if (isset ($_SESSION['online']))  { ?><!-- // erst wenn eingelogt sichtbar -->
                        <button type="submit" class="btn btn-success">Logout</button> 
                        <input type="hidden" value="wiwi" name="sent" />
            <?php } ?>                        
                    </form>
</div>
                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container" id="debl">
                <h1>Devil - Blog</h1>
                <p>(another hot Blog)</p>
<!--                 <p><?php print_r($_SESSION); echo " / " . $view . $error_message;
                 echo "<br />" . print_r($_POST);?></p>-->
                  
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-lg-2">    
                    <!--<h2>Links</h2>-->
                </div>
                <div class="col-lg-8">
                        <?php
                        include './view/' . $view;
                        //include './inc/' . $inc;
                        ?>
                </div>
                <div class="col-lg-2">
                    <div class="col-md-12 text-center text-success">
                    <h2>Suchen</h2>
                    <form role="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" />
                    <div class="form-group">
                        <input class="form-control" type="search" name="suchstring" placeholder="nach Name"value="" size=""/>
                    </div>
                    <div class="text-center">
                        <input class="alert-info btn-xm" type="submit" value="Suchen" />
                        <input class="alert-info btn-xm" type="reset" value="Reset" />
                        <input type="hidden" value="1" name="sent" />     
                    </div>
                    </form>
                    </div>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; Company 2013</p>
            </footer>
        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')</script>
        
        <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <script>
            var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function(d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = '//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
    
    // klappen kommentar
$("#ttb1").click(function () {
  $("#tt").show("slow");
})
$("#ttb").click(function () {
  $("#tt").hide("slow");
});

 </script>
    </body>
</html>


<!-- Modal -->
<div class="modal fade" id="my" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Schreib dein Kommentar</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="index.php" method="POST">
            <input type="hidden" name="insertsent" value="1" /> 
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name_kom" placeholder="EnterName"
                        value="">
            </div>
            <div class="form-group">
                <label for="Kommentar">Kommentar</label>
                <textarea class="form-control" rows="3" name="kommentar" required=""></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-default" disabled=""></input>
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->