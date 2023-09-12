
<?= $this->extend('layouts/base')  ;  ?>
<?= $this->section('content'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(session()->getTempdata('error')){ ?>
    <div>
      <?= session()->getTempdata('error') ;?>
    </div>
    <?php } ?>

     <?php   if(isset($validation))  { ?>
        <div>
          <?= $validation->listError('errors'); } ?>

        </div>
<?php form_open() ; ?>

    <center>
    <form method="Post" action="<?=base_url(); ?>/pass_oublie">
     <h1>FORGOT PASSWORD</h1>
    <label for="">Identification</label><br>
    <br><input type="text" name="email" placeholder="Enter your mail or phone"><br>
    <span><?= isset($validati)? display_error($validati,'email'):''?></span>
    <br><input type="submit" name="VAL" id="val" value="VALIDE"><br>
    </form>
    </center>
</body>
</html>