<!DOCTYPE HTML>
<html>
<body>
<?php
if(isset($data)){
  $x=0;
   ?>

<table border="1">
  <tr>
     <th>No</th>
    <th>Nom </th>
    <th>Prenom </th>
    <th>Naissance </th>
    <th>Genre </th>
    </tr> 
    <?php
  foreach($data as $data){
    $x++;
 
   ?>
 
     <tr>
          <td><?=$x ?></td>
         <td><?=$data->nom ?></td>
         <td><?=$data->prenom ?></td>
         <td><?=$data->datenaissance ?></td>
         <td><?=$data->genre ?></td>

  </tr>


  <?php   }
 
 ?>
    </table>
 <?php
   //echo strval($userinf)."<br>";
   //echo gettype($userinfo);  
}
else{
   if(isset($dat))  {
     echo($dat);
   }
}
?>
