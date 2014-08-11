<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//echo '<h2>Blogeintrag erstellen</h2>';
?>

<div class="col-lg-2">    

</div>

<div class="col-lg-8">
    
    <h2 class="text-center">Blogeintrag erstellen</h2>
    
<form role="form" action="index.php" method="POST">
    <input type="hidden" name="insertsent_b" value="1" /> 
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="EnterName"
           disabled="" value="<?php echo $_SESSION['user'] ?>">
  </div>
  <div class="form-group">
    <label for="Meinung">Meinung</label>
    <input type="text" class="form-control" name="betreff" value="" required="">
  </div>
  <div class="form-group">
    <label for="Beitrag">Beitrag</label>
    <textarea class="form-control" rows="3" name="eintrag" required=""></textarea>
  </div>
  <div class="text-right">
       <input type="reset" class="btn btn-default"></>
       <input type="submit" class="btn btn-default"></>
  </div>                           
</form>
</div>

<div class="col-lg-2">    

</div>