<?php
  namespace Leopold;
  require_once "pdo.php";
  $db=new Database();

  function print_r2($val){
     echo "<PRE>";
     print_r($val);
     echo "</PRE>";

   }

   //print_r2($db);
  $role= $db->affiche_role(1);
  $role= $db->affiche_role(2);
  $role= $db->affiche_role(3);
print_r2($role);




 ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <div class="row">
   <div class="col-xs-6 col-md-4">name</div>
   <div class="col-xs-6 col-md-4">nb Users</div>
   <div class="col-xs-6 col-md-4">Action</div>
 </div>
 <div class="row">
   <div class="col-xs-6 col-md-4"> 1</div>
   <div class="col-xs-6 col-md-4">2</div>
   <div class="col-xs-6 col-md-4">3</div>
 </div>
 <div class="row">
  <div class="col-xs-6 col-md-4">4</div>
  <div class="col-xs-6 col-md-4">5</div>
  <div class="col-xs-6 col-md-4">6</div>
</div>
