
<?= $this->extend('layouts/base')  ;  ?>
<?= $this->section('content'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      #dec{
   width:20px;
   margin :70%;
 color:red;

  }
  #div{
    color:red;
   border-radius: 3px solid red;
   background:red;
  }
    </style>
</head>
<body>

<?php if(session()->getTempdata('error')){ ?>
    <div>
      <?= session()->getTempdata('error') ;?>
    </div>
    <?php } ?>

     <?php   if(isset($validati))  { ?>
        <div>
          <?= $validati->listError('errors'); } ?>

        </div id='div' >
<?php form_open() ; ?>


    <center>
    <form method="Post" action="<?=base_url(); ?>/Confirme_compte">
     <h1>FORGOT PASSWORD</h1>
    <label for="">CODE CONFIRMATION</label><br>
    <br><input type="text" name="email" placeholder="Enter your code of confirmation"><br>
    <span><?= isset($validation) ? display_error($validation,'email'):''?></span>
    <br><input type="submit" name="VAL" id="val" value="VALIDE"><br>
    </form>

    </center>
    <a href="<?=base_url() ?>/<?=base_url() ?>/Info" id="dec">DECONNEXION</a>
</body>
</html>