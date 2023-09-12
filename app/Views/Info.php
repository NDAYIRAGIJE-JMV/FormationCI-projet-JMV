
<?= $this->extend('layouts/base')  ;  ?>
<?= $this->section('content'); ?>

<center><h1> bonjour <?php echo $nom ?> </h1></center>
<?php 
  /* if(isset($name)){
  foreach($name as $n=>$r){
    echo '<h1>'.$r['nom']." ".$r['prenom'].' né '.$r['lieu_naissance']." en date: ".$r['date_naissance'].'</h1>';
    
   }
   if(!$r){
    echo'mot de passe inter not correct';
  }
   
}*/

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body{
          
            background: green;
        }
        label {
            color: aqua;

        }



        .login {
            text-align: center;
            min-height: 25vh;
            line-height: 10px;
            border: 5px solid pink;
            margin: 10%;
            max-width: 40%;
            margin-left: 35%;
            margin-top: 20%;
            color: aquamarine;
               background: yellowgreen;
        }

        * {
            color: aquamarine;

        }
    </style>

</head>

<body>
<?php if(session()->getTempdata('error')){ ?>
    <div>
      <?= session()->getTempdata('error') ;?>
    </div>
    <?php } ?>
<?php form_open() ; ?>
<form method="Post" action="<?=base_url(); ?>/Info">
    <div class="login">
        <h1>LOGIN</h1>
        <label for="" name="iD">Identification</label><input type="text" name="mail" placeholder="Nom Utilisateur"><br><br>
        <span><?= isset($validation) ? display_error($validation,'mail'):''?></span><br>
        <br> <label for="" name="pass">Mo de passe</label><input type="password"placeholder="mot de passe" name="pass"> <br> <br>
        <span><?= isset($validation)? display_error($validation,'pass'):''?></span>
        <br><input type="submit" name="valide" value="LOGIN">
       
    </div>
    
     <ul><li><a href="<?=base_url() ?>/pass_oublie">mot de passe oublie??</a></li><br>
     <li><a href="<?=base_url() ?>">S'INSCRIRE</a></li>
     <ul>
  
    </form>
    
</body> 


  
 </html>






