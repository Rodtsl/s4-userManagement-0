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





 ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <div class="row">
   <div class="col-xs-6 col-md-4">name</div>
   <div class="col-xs-6 col-md-4">nb Users</div>
   <div class="col-xs-6 col-md-4">Action</div>
 </div>
 <?php
 $role = $db->affiche_role("name");
     foreach($role as $role) // résultat du tris des nom
     {
       echo '<div class="row"><div class="col-xs-6 col-md-4">',$role['name'],'</div><div class="col-xs-6 col-md-4">',$role['nb_role'],"</div>
         <td><input type='submit' name='suprimer_",$role['id'],"' value='Supprimer' id='suppr' onClick=\"getname(this)\"></td>
         <td><input type='submit' name='ajouter_",$role['id'],"' value='Ajouter' id='suppr' onClick=\"getname(this)\"></td></tr>";
    }
?>
