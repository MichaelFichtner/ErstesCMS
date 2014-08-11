<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// echo $error_message;

?>

<div class="col-lg-2">    

</div>

<div class="col-lg-8">

    <h2 class="text-center">Registrieren</h2>

<form role="form" name="test" action="index.php" method="POST">
<input type="hidden" name="insertsent" value="1" /> 
<div class="form-group">
    <label >Name :</label>
    <input class="form-control" type="text" name="name" value="<?php echo $name; ?>" required="" />
</div>
<div class="form-group">
    <label >Alter :</label>
    <input class="form-control" type="text" name="alter" value="<?php echo $alter; ?>" required="" />
</div>
<div class="col-sm-offset-8 col-sm-5">
<label class="radio-inline">
    <input type="radio" name="gender" value="female" <?php echo $female; ?> /> Female
</label>
<label class="radio-inline">
    <input type="radio" name="gender" value="male" <?php echo $male; ?> /> Male
</label>
</div>
<div class="form-group">
    <label >Nickname :</label>
    <input class="form-control" type="text" name="nickname" value="<?php echo $nickname; ?>" required="" />
</div>
<div class="form-group">
    <label>Stell Dich vor :</label>
    <textarea class="form-control" rows="6" name="beschreibung">....</textarea>
</div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="passw" value="" required="" placeholder="<?php echo $error_message; ?>">
</div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password wiederh.</label>
    <input type="password" class="form-control" name="passw2" value="" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required=""/>
  </div>
   <div class="text-right">
       <input type="reset" class="btn btn-default"></>
       <input type="submit" class="btn btn-default"></>              
   </div>
</form>
</div>

<div class="col-lg-2">    

</div>